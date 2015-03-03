<?php

class Projects_Model extends C3X_Model
{
    var $lu_key = "project";

	public function Projects_Model()
	{
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
        $query = $this->db->query("SELECT title,description,asset_type_name FROM projects_asset_lu LEFT JOIN assets ON projects_asset_lu.asset_id=assets.id LEFT JOIN asset_types ON assets.asset_type_id=asset_types.id WHERE project_id='".$pid."'");
        $assets = $query->result();

        //get media
        foreach ($assets as $key => $asset) {
            $query = $this->db->query("SELECT media_type_name,filename FROM assets_media_lu LEFT JOIN media ON assets_media_lu.media_id=media.id LEFT JOIN media_types ON media.meida_type_id=media_types.id WHERE asset_id='".$asset->id."'");
            $asset->media = $query->result();
        }

        return $assets;
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