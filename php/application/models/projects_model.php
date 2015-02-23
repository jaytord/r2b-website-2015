<?php

class Projects_Model extends C3X_Model
{
	public function Projects_Model()
	{
		$this->table = "projects";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'title'                     => array("shown"=>true,     "label"=>"Title"),
            'client'                    => array("shown"=>true,     "label"=>"Client"),
            'description'               => array("shown"=>true,     "label"=>"Description"),
            'tags'                      => array("shown"=>true,     "label"=>"Tags"),
            'image'                     => array("shown"=>true,     "label"=>"Image"),
            'detail_name'               => array("shown"=>true,     "label"=>"Detail Name"),
            'href'                      => array("shown"=>true,     "label"=>"Link")
		);
	}

	
}

?>