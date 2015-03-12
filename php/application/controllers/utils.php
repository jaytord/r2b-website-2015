<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model("projects_model");
		$this->load->model("assets_model");
		$this->load->model("projects_asset_lu_model");
		$this->load->model("projects_category_lu_model");
		$this->load->model("projects_link_lu_model");
		$this->load->model("assets_media_lu_model");
		$this->load->model("media_model");
	}

	public function index()
	{
		echo "You shouldn't be here.";
	}

	public function deleteproject($pid,$assetsonly){
		echo "deletiing project: ". $pid;

		$response = array();

		//remove project record
		if($assetsonly == 0){
			$response["projresp"] = $this->projects_model->delete( array("id"=>$pid) );

			//remove category lookup records with that project id
			$response["catluresp"] = $this->projects_category_lu_model->delete( array("project_id"=>$pid) );

			//remove link lookup records with that project id
			$response["linkluresp"] = $this->projects_link_lu_model->delete( array("project_id"=>$pid) );
		}

		//remove assets associated with that project id
		//first get all of the lookup records;
		$response["assetlurecords"] = $this->projects_asset_lu_model->get( array("project_id"=>$pid) );

		//loop through the lookup records
		foreach($response["assetlurecords"] as $key => $record) {
			$this->deleteasset( $record->asset_id );
		}

		var_dump($response);
	}

	public function addproject( $slug, $thumbnail_name, $header_name, $video_name, $categoryid=1 ){
		echo "add project with header and video: ". $slug . ":" .$thumbnail_name. ":" .$header_name. ":" .$video_name. ":" .$categoryid;

		$response = array();

		//create project record
		$projectid = $this->projects_model->add( array( "slug"=>$slug, "thumbnail_image"=>$thumbnail_name ) );
		$response["projectid"] = $projectid;

		//add category lu record
		$categoryluid = $this->projects_category_lu_model->add( array("project_id"=>$projectid, "category_id"=>$categoryid ) );
		$response["categoryluid"] = $categoryluid;

		//ADD HEADER ASSET
		//add asset 
		if($header_name != "NULL"){
			$header_assetid = $this->assets_model->add( array( "asset_type_id"=>1 ) );
			$response["header_assetid"] = $header_assetid;
			//add media
			$header_meidaid = $this->media_model->add( array( "media_type_id"=>1, "filename"=>$header_name ) );
			$response["header_meidaid"] = $header_meidaid;
			//add asset media lu
			$header_medialuid = $this->assets_media_lu_model->add( array( "asset_id"=>$header_assetid, "media_id"=>$header_meidaid ) );
			$response["header_medialuid"] = $header_medialuid;
			//add project asset lu
			$header_assetluid = $this->projects_asset_lu_model->add( array( "project_id"=>$projectid, "asset_id"=>$header_assetid ) );
			$response["header_assetluid"] = $header_assetluid;
		}

		//ADD VIDEO ASSET
		//add asset 
		$video_assetid = $this->assets_model->add( array( "asset_type_id"=>2 ) );
		$response["video_assetid"] = $video_assetid;
		//add media
		$video_mediaid = $this->media_model->add( array( "media_type_id"=>2, "filename"=>$video_name ) );
		$response["video_mediaid"] = $video_mediaid;
		//add asset media lu
		$video_medialuid = $this->assets_media_lu_model->add( array( "asset_id"=>$video_assetid, "media_id"=>$video_mediaid ) );
		$response["video_medialuid"] = $video_medialuid;
		//add project asset lu
		$video_assetluid = $this->projects_asset_lu_model->add( array( "project_id"=>$projectid, "asset_id"=>$video_assetid ) );
		$response["video_assetluid"] = $video_assetluid;

		var_dump($response);
	}

	public function addprojectvideo( $projectid,$video_name ){
		echo "adding project video to: ". $projectid. " with filename:" .$video_name;

		$response = array();

		//ADD VIDEO ASSET
		//add asset 
		$video_assetid = $this->assets_model->add( array( "asset_type_id"=>2 ) );
		$response["video_assetid"] = $video_assetid;
		//add media
		$video_mediaid = $this->media_model->add( array( "media_type_id"=>2, "filename"=>$video_name ) );
		$response["video_mediaid"] = $video_mediaid;
		//add asset media lu
		$video_medialuid = $this->assets_media_lu_model->add( array( "asset_id"=>$video_assetid, "media_id"=>$video_mediaid ) );
		$response["video_medialuid"] = $video_medialuid;
		//add project asset lu
		$video_assetluid = $this->projects_asset_lu_model->add( array( "project_id"=>$projectid, "asset_id"=>$video_assetid ) );
		$response["video_assetluid"] = $video_assetluid;

		var_dump($response);
	}

	public function deleteasset( $assetid ){
		echo "deleting asset: ". $assetid;

		$response = array();

		//remove asset
		$assetresponse = $this->assets_model->delete( array( "id"=>$assetid ) );
		$response["assetresponse"] = $assetresponse;

		//remove project lookup records for this asset
		$assetluresponse = $this->projects_asset_lu_model->delete( array( "asset_id"=>$assetid ) );
		$response["assetluresponse"] = $assetluresponse;

		//remove media lookup records for this asset
		$medialuresponse = $this->assets_media_lu_model->delete( array( "asset_id"=>$assetid ) );
		$response["medialuresponse"] = $medialuresponse;

		//remove asset
		$assetresponse = $this->assets_model->delete( array( "id"=>$assetid ) );
		$response["assetresponse"] = $assetresponse;

		var_dump($response);
	}
}