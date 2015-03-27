<?php

class Project_Module_Lu_Model extends C3X_Model
{
	public function Project_Module_Lu_Model()
	{
		$this->table = "project_module_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'module_id'                  => array("shown"=>true,     "label"=>"Module ID"),
            'project_id'              	=> array("shown"=>true,     "label"=>"Project ID")
		);
	}
}

?>