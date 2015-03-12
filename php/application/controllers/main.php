<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	/*==== PAGES =====*/
	public function index( $_page_id = "home", $category_slug = "" )
	{
		$viewdata = $this->getpagedata( $_page_id, $category_slug );

		$this->load->view( 'index_view', $viewdata );
	}

	//project detail
	public function projectdetail( $_detail_slug, $category_slug = "project", $parent_slug = "projects" ){
		$viewdata = $this->getprojectdetaildata( $_detail_slug, $category_slug );
		$viewdata["page_id"] = "project";
		$viewdata["category_slug"] = $category_slug; 
		$viewdata["parent_slug"] = $parent_slug;

		$this->load->view("index_view", $viewdata );
	}

	/*==== JS PAGE TEMPLATES =====*/
	//page js template
	public function pagetemplate( $_page_id = "home", $category_slug = "" ){
		$viewdata = $this->getpagedata( $_page_id, $category_slug );
		$viewdata["template"] = true;

		$this->load->view( 'pages/' . $_page_id . "_view", $viewdata );
	}

	//page detail js template called with ajax from project.js view
	public function projectdetailtemplate( $_detailslug, $category_slug = "project", $parent_slug = "projects" ){
		$viewdata = $this->getprojectdetaildata( $_detailslug, $category_slug );
		$viewdata["page_id"] = "project"; 
		$viewdata["category_slug"] = $category_slug; 
		$viewdata["parent_slug"] = $parent_slug;
		$viewdata["template"] = true;

		$detail = $this->load->view( "project_detail_view", $viewdata, true);
		echo $detail;
	}

	/*==== DATA FUNCTIONS =====*/
	public function getprojectdetaildata( $_detailslug, $_category_slug = ""){
		$model = $this->load->model( "projects_model" );
		$project_data = $this->projects_model->get( array( "slug"=>$_detailslug ) );
		$project_data = $project_data[0];

		$assets = $this->projects_model->getassets( $project_data->id );
		$links = $this->projects_model->getlinks( $project_data->id );

		$nextrecord = $this->projects_model->nextproject( $project_data->id, $_category_slug );
		if($nextrecord) $nextrecord = $nextrecord->slug;

		$previousrecord = $this->projects_model->previousproject( $project_data->id, $_category_slug );
		if($previousrecord) $previousrecord = $previousrecord->slug;

		if( !empty( $project_data->client_logo ) ){
			$client_logo = base_url()."img/client_logos/".$project_data->client_logo.".jpg";
		} else {
			$client_logo = "http://placehold.it/410/111111/EEEEEE&text=LOGO";
		}

		return array( 
			"data"=>$project_data, 
			"previous"=>$previousrecord, 
			"next"=>$nextrecord, 
			"assets"=>$assets, 
			"links"=>$links,
			"client_logo"=>$client_logo
		);
	}

	public function getpagedata( $_page_id = "home", $_category_slug = "" ){
		$model_name = ($_page_id == "campaigns" ? "projects" : $_page_id) . "_model";
 		$model_path = APPPATH . "models/" . $model_name . ".php";

 		$data = array();

 		if( file_exists( $model_path ) ){
	 		$this->load->model( $model_name, 'model' );
	 		if( empty($_category_slug) ){
	 			$data = $this->model->get();
	 		} else {
	 			$data = $this->model->getbycategory( $_category_slug );
	 		}
	 	}

	 	return array( "page_id"=>$_page_id, "data"=>$data, "category_slug"=>$_category_slug );
	}
}