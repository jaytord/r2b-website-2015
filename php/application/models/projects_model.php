<?php

class Projects_Model extends C3X_Model
{
    var $lu_key = "project";

	public function Projects_Model()
	{
        $this->load->model("assets_model");
        $this->load->model("projects_asset_lu_model", "asset_lu_model");

        $this->load->model("links_model");
        $this->load->model("projects_link_lu_model", "link_lu_model");

		$this->table = "projects";
		$this->pk = "id";
    	$this->fields = array(
            'id'                                    => array("shown"=>false,    "label"=>"ID"),
            'slug'                                  => array("shown"=>false,    "label"=>"Slug"),
            'title'                                 => array("shown"=>true,     "label"=>"Title"),
            'description'                           => array("shown"=>true,     "label"=>"Description"),
            'thumbnail_image'                       => array("shown"=>true,     "label"=>"Thumbnail Image"),
            'detail_name'                           => array("shown"=>true,     "label"=>"Detail Name"),
            'client_id'                             => array("shown"=>true,     "label"=>"Client Id")
        );
	}

    function getassets($pid){
        $query = $this->db->query("SELECT title,filename,description FROM projects_asset_lu LEFT JOIN assets ON projects_asset_lu.asset_id=assets.id WHERE project_id='".$pid."'");
        return $query->result();
    }

    function getlinks($pid){
        $query = $this->db->query("SELECT label,href FROM projects_link_lu LEFT JOIN links ON projects_link_lu.link_id=links.id WHERE project_id='".$pid."'");
        return $query->result();
    }

	function lu_key(){
        return $this->lu_key;
    }
}

?>