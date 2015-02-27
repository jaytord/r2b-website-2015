<?php

class Casestudies_Model extends C3X_Model
{
    var $lu_key = "casestudy";

	public function Casestudies_Model()
	{
		$this->table = "casestudies";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						            => array("shown"=>false, 	"label"=>"ID"),
            'slug'                                  => array("shown"=>false,    "label"=>"Slug"),
            'title'                                 => array("shown"=>true,     "label"=>"Title"),
            'description'                           => array("shown"=>true,     "label"=>"Description"),
            'thumbnail_image'                       => array("shown"=>true,     "label"=>"Thumbnail Image"),
            'detail_name'                           => array("shown"=>true,     "label"=>"Detail Name"),
            'client_id'                             => array("shown"=>true,     "label"=>"Client Id")
		);
	}

    function getassets($pid){
        $query = $this->db->query("SELECT title,filename,description FROM casestudies_asset_lu LEFT JOIN assets ON casestudies_asset_lu.asset_id=assets.id WHERE casestudy_id='".$pid."'");
        return $query->result();
    }

    function getlinks($pid){
        $query = $this->db->query("SELECT label,href FROM casestudies_link_lu LEFT JOIN links ON casestudies_link_lu.link_id=links.id WHERE casestudy_id='".$pid."'");
        return $query->result();
    }

    function lu_key(){
        return $this->lu_key;
    }
}

?>