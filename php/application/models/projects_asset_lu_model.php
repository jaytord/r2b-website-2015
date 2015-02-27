<?php

class Projects_Asset_Lu_Model extends C3X_Model
{
	public function Projects_Asset_Lu_Model()
	{
		$this->table = "projects_asset_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'asset_id'                  => array("shown"=>true,     "label"=>"Asset ID"),
            'project_id'              	=> array("shown"=>true,     "label"=>"Project ID")
		);
	}
}

?>