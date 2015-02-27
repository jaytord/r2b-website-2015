<?php

class Casestudies_Link_Lu_Model extends C3X_Model
{
	public function Casestudies_Link_Lu_Model()
	{
		$this->table = "casestudies_link_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'link_id'                  	=> array("shown"=>true,     "label"=>"Link ID"),
            'casestudy_id'              => array("shown"=>true,     "label"=>"Casestudy ID")
		);
	}
}

?>