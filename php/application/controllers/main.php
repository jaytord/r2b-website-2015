<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index( $_page_id = "home" )
	{
		$data = $this->getpagedata($_page_id);
		$viewdata = array("page_id"=>$_page_id, "data"=>$data);

		$this->load->view( 'index_view', $viewdata );
	}

	public function template( $_page_id = "home" ){
		$data = $this->getpagedata($_page_id);
		$viewdata = array("page_id"=>$_page_id, "data"=>$data);

		$this->load->view( 'pages/' . $_page_id . "_view", $viewdata );
	}

	public function getpagedata( $_page_id = "home" ){
		$model_name = $_page_id . "_model";
 		$model_path = APPPATH . "models/" . $model_name . ".php";

 		$data = array();

 		if( file_exists( $model_path ) ){
	 		$this->load->model( $model_name, 'model' );
	 		$data = $this->model->get();
	 	}

	 	return $data;
	}
}