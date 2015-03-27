<?php

class Module_Media_Lu_Model extends C3X_Model
{
	public function Module_Media_Lu_Model()
	{
		$this->table = "module_media_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'module_id'                  => array("shown"=>true,     "label"=>"Module ID"),
            'media_id'              	=> array("shown"=>true,     "label"=>"Media ID")
		);
	}
}

?>