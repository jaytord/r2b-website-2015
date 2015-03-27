<?php

class Modules_Model extends C3X_Model
{
	public function Modules_Model()
	{
		$this->table = "modules";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'title'                     => array("shown"=>true,     "label"=>"Title"),
            'heading'                   => array("shown"=>true,   	"label"=>"Heading"),
            'subhead'                   => array("shown"=>true,   	"label"=>"Subhead"),
            'blurb'                     => array("shown"=>true,     "label"=>"blurb"),
            'filename'           		=> array("shown"=>true,     "label"=>"File Name"),
            'description'           	=> array("shown"=>true,     "label"=>"Description"),
            'module_type_id'           	=> array("shown"=>true,     "label"=>"Module Type ID")
		);
	}
}

?>