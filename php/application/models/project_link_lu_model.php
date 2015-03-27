<?php

class Project_Link_Lu_Model extends C3X_Model
{
	public function Project_Link_Lu_Model()
	{
		$this->table = "project_link_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'link_id'                  	=> array("shown"=>true,     "label"=>"Link ID"),
            'project_id'              	=> array("shown"=>true,     "label"=>"Project ID")
		);
	}
}

?>