<?php

class Casestudies_Asset_Lu_Model extends C3X_Model
{
	public function Casestudies_Asset_Lu_Model()
	{
		$this->table = "casestudies_asset_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'asset_id'                  => array("shown"=>true,     "label"=>"Asset ID"),
            'casestudy_id'              => array("shown"=>true,     "label"=>"Case Study ID")
		);
	}
}

?>