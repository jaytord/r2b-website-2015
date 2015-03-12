<?php

class Links_Model extends C3X_Model
{
	public function Links_Model()
	{
		$this->table = "links";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'label'                     => array("shown"=>true,     "label"=>"Label"),
            'href'           			=> array("shown"=>true,     "label"=>"Href"),
		);
	}
}

?>