<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index( $_page_id = "home" )
	{
		$viewdata = $this->getpagedata($_page_id);

		$this->load->view( 'index_view', $viewdata );
	}

	public function pagetemplate( $_page_id = "home" ){
		$viewdata = $this->getpagedata( $_page_id );

		$this->load->view( 'pages/' . $_page_id . "_view", $viewdata );
	}

	public function pagedetail( $_page_id, $_detailslug ){
		$viewdata = $this->getpagedetaildata( $_page_id, $_detailslug );

		$this->load->view("index_view", $viewdata );
	}

	public function pagedetailtemplate( $_page_id, $_detailslug ){
		$viewdata = $this->getpagedetaildata( $_page_id, $_detailslug );

		$detail = $this->load->view( "project_detail_view", $viewdata, true);

		echo $detail;
	}

	public function getpagedetaildata( $_page_id, $_detailslug ){
		$parent = array();

		//determine parent
		switch($_page_id){
			case 'project'		: $parent["slug"] = "projects"; 		$parent["title"] = "Projects"; 		break;
			case 'casestudy'	: $parent["slug"] = "casestudies"; 		$parent["title"] = "Case Studies"; 	break;
		}

		$model = $this->load->model( $parent["slug"] . "_model", "detail_model" );
		$data = $this->detail_model->get( array( "slug"=>$_detailslug ) );
		$data = $data[0];

		$assets = $this->detail_model->getassets( $data->id );
		$links = $this->detail_model->getlinks( $data->id );

		$nextrecord = $this->detail_model->nextrecord( $data->id );
		if($nextrecord) $nextrecord = $nextrecord->slug;

		$previousrecord = $this->detail_model->previousrecord( $data->id );
		if($previousrecord) $previousrecord = $previousrecord->slug;

		if( $data->client_id > 0 ){
			$this->load->model("clients_model");
			$client = $this->clients_model->get(array("id"=>$data->client_id));
			$client_logo = base_url()."img/clients/".$client->thumbnail_image.".jpg";
		} else {
			$client_logo = "http://placehold.it/410/111111/EEEEEE&text=LOGO";
		}

		//for case studies use the project page
		$page_slug = $_page_id;

		if($_page_id == "casestudy") $_page_id = "project";

		return array( 
			"page_id"=>$_page_id, 
			"data"=>$data, 
			"previous"=>$previousrecord, 
			"next"=>$nextrecord, 
			"parent"=>$parent, 
			"assets"=>$assets, 
			"links"=>$links, 
			"page_slug"=>$page_slug, 
			"client_logo"=>$client_logo
		);
	}

	public function getpagedata( $_page_id = "home" ){
		$model_name = $_page_id . "_model";
 		$model_path = APPPATH . "models/" . $model_name . ".php";

 		$data = array();

 		if( file_exists( $model_path ) ){
	 		$this->load->model( $model_name, 'model' );
	 		$data = $this->model->get();
	 	}

	 	return array( "page_id"=>$_page_id, "data"=>$data);
	}
}