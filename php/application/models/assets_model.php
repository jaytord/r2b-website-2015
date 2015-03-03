<?php

class Assets_Model extends C3X_Model
{
	public function Assets_Model()
	{
		$this->table = "assets";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'title'                     => array("shown"=>true,     "label"=>"Title"),
            'filename'           		=> array("shown"=>true,     "label"=>"File Name"),
            'description'           	=> array("shown"=>true,     "label"=>"Description"),
            'asset_type_id'           	=> array("shown"=>true,     "label"=>"Asset Type ID")
		);

		function getlwithmedia($pid){
	        $asset = $this->get($pid);
	        
	        return $query->result();
	    }
	}
}

?>