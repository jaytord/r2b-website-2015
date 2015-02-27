<?php

class Projects_Link_Lu_Model extends C3X_Model
{
	public function Projects_Link_Lu_Model()
	{
		$this->table = "projects_link_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'link_id'                  	=> array("shown"=>true,     "label"=>"Link ID"),
            'project_id'              	=> array("shown"=>true,     "label"=>"Project ID")
		);
	}
}

?>