<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	public function index( $_page_id = "projects" )
	{
		echo "R2B API: ". $_page_id;
 		
 		$model_name = $_page_id . "_model";
 		$model_path = APPPATH . "models/" . $model_name . ".php";

 		if( file_exists( $model_path ) ){
	 		$this->load->model( $model_name, 'model' );
	 		$all = $this->model->get();
	 		var_dump($all);
	 	} else {
	 		echo "No model for this page.";
	 	}
	}

	public function fetchimages( $_page_id = "projects" )
	{
		$this->load->model( $_page_id . "_model", 'model' );
 		$all = $this->model->get();

 		foreach ($all as $key => $value) {
 			$size 		= $_page_id == "assets" ? "700x394" : "410x410";
 			$filename 	= $_page_id == "assets" ? $value->filename : $value->thumbnail_image;
 			$image = "http://media.click3x.com/images/".$size."/".$filename.".jpg";

 			if(getimagesize($image)){
	 			// $filename = strtolower( $value->title );
	 			// $filename = str_replace(' ', '_', $filename); // Replaces all spaces with hyphens.
	 			// $filename = preg_replace('/[^A-Za-z0-9\-\_]/', '', $filename); // Removes special chars.

	 			//$this->model->update( array( "id"=>$value->id, "image"=>$filename ) );

	 			copy( $image, FCPATH."img/".$_page_id."/".$filename.".jpg");
	 		} else {
	 			echo "no image : ". $value->id;
	 		}
 		}
	}

	public function parsedetails( $_model_id )
	{
		$this->load->model("assets_model");
		$this->load->model("links_model");

		$this->load->model( $_model_id. "_asset_lu_model", "asset_lookup_model");
		$this->load->model( $_model_id. "_link_lu_model", "link_lookup_model");

		$this->asset_lookup_model->clear();
		$this->link_lookup_model->clear();

		$this->load->model( $_model_id."_model", "model");
		$projects = $this->model->get();

		echo "<h1>::::OPENING DETAIL FILES::::</h1><ul>";
		foreach ($projects as $key => $project) {
			$url = "http://staging.reason2be.com/data/r2b/". $project->detail_name . ".json";
			$json = $this->openjsonfile( $url );
			$assets = $json->post_detail->assets;
			$links = $json->post_detail->related_links;
			$description = $json->post_detail->description;

			//add description
			$updaetid = $this->model->update( array("id"=>$project->id, "description"=>$description ) );

			echo "<li>";
			echo "<h2>". $project->title. "</h2><p>";
			echo $updaetid; print_r($json->post_detail->description);
			echo "</p><p>".$url."</p><p>";

			foreach ($assets as $akey => $asset) {
				print_r( $asset );
				echo "<br />";

				$atitle 		= isset( $asset->title ) ? $asset->title : "";
				$adesc 			= isset( $asset->description ) ? $asset->description : "";
				$afilename 		= isset( $asset->filename ) ? $asset->filename : "";
				$amediatype 	= isset( $asset->media_type ) ? $asset->media_type : "";

				$this->createnewasset( $this->model->lu_key(), $project->id, $atitle, $adesc, $afilename, $amediatype );
			}
			echo "<br />";
			foreach ($links as $lkey => $link) {
				print_r( $link );
				echo "<br />";

				$href			= isset( $link->href ) ? $link->href : "";
				$label 			= isset( $link->title ) ? $link->title : "";

				$this->createnewlink( $this->model->lu_key(), $project->id, $label, $href );
			}

			echo "</p></li>";
		}

		echo "<h1>::::END::::</h1></ul>";
	}

	public function createnewasset( $lu_key, $projectid, $title, $description, $filename, $media_type ){
		//create asset record
		$assetdata = array(
			"title"=>$title,
			"description"=>$description,
			"filename"=>$filename,
			"asset_type_id"=>$media_type
		);
		$asset_id = $this->assets_model->add( $assetdata );

		//create lookup record
		if( !empty($asset_id) && $asset_id > 0 ){
			$ludata = array( "asset_id"=>$asset_id );
			$ludata[ $lu_key . "_id" ] = $projectid;
			$luid = $this->asset_lookup_model->add( $ludata );
		}

		echo $asset_id . " : " . $luid . "<br />";
	}

	public function createnewlink( $lu_key, $projectid, $label, $href ){
		//create asset record
		$linkdata = array(
			"label"=>$label,
			"href"=>$href,
		);
		$link_id = $this->links_model->add( $linkdata );

		//create lookup record
		if( !empty($link_id) && $link_id > 0 ){
			$ludata = array( "link_id"=>$link_id );
			$ludata[ $lu_key . "_id" ] = $projectid;
			$luid = $this->link_lookup_model->add( $ludata );
		}

		echo  "<br /><br />". $link_id . " : " . $luid . "<br />";
	}

	public function openjsonfile($url){
		$ch = curl_init( $url );

		curl_setopt_array( $ch, array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => array('Content-type: application/json')
		));

		$result = curl_exec($ch);

		return json_decode( strip_tags($result) );
	}

	public function parseassetmedia(){
		echo "working";

		$this->load->model("assets_model");
		$this->load->model("assets_media_lu_model");
		$this->load->model("media_model");

		$allassets = $this->assets_model->get();

		foreach ($allassets as $key => $asset) {
			$media_id = $this->media_model->add(array(
				"media_category_id"=>$asset->asset_type_id == 1 ? 1 : 2,
				"filename"=>$asset->filename,
				"media_type_id"=>$asset->asset_type_id == 1 ? 1 : 2
			));

			$this->assets_media_lu_model->add(array(
				"media_id"=>$media_id,
				"asset_id"=>$asset->id
			));
		}

		var_dump($allassets);
	}

	public function creatprojectcategories(){
		$this->load->model("projects_model");
		$this->load->model("projects_category_lu_model");

		$all = $this->projects_model->get();
		foreach ($all as $key => $project) {
			$this->projects_category_lu_model->add(array(
				"category_id"=>2,
				"project_id"=>$project->id
			));
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */