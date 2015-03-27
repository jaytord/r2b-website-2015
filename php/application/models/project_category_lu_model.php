<?php

class Project_Category_Lu_Model extends C3X_Model
{
	public function Project_Category_Lu_Model()
	{
		$this->table = "project_category_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 							=> array("shown"=>false, 	"label"=>"ID"),
            'category_id'                  	=> array("shown"=>true,     "label"=>"Category ID"),
            'project_id'              		=> array("shown"=>true,     "label"=>"Project ID")
		);
	}
}

?>