<?php

class Clients_Model extends C3X_Model
{
	public function Clients_Model()
	{
		$this->table = "clients";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'title'                     => array("shown"=>true,     "label"=>"Title"),
            'description'               => array("shown"=>true,     "label"=>"Description"),
            'tags'                      => array("shown"=>true,     "label"=>"Tags"),
            'image'                     => array("shown"=>true,     "label"=>"Image"),
            'href'                      => array("shown"=>true,     "label"=>"Link")
		);
	}

	
}

?>