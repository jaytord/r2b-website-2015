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
 			$image = "http://media.click3x.com/images/410x410/".$value->image.".jpg";

 			if(getimagesize($image)){

	 			$filename = strtolower( $value->title );
	 			$filename = str_replace(' ', '_', $filename); // Replaces all spaces with hyphens.
	 			$filename = preg_replace('/[^A-Za-z0-9\-\_]/', '', $filename); // Removes special chars.

	 			$this->model->update( array( "id"=>$value->id, "image"=>$filename ) );

	 			copy( $image, FCPATH."img/".$_page_id."/".$filename . ".jpg");
	 		} else {
	 			echo "no image : ". $value->id;
	 		}
 		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */