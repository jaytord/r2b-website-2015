<?php

class Assets_Media_Lu_Model extends C3X_Model
{
	public function Assets_Media_Lu_Model()
	{
		$this->table = "assets_media_lu";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
            'asset_id'                  => array("shown"=>true,     "label"=>"Asset ID"),
            'media_id'              	=> array("shown"=>true,     "label"=>"Media ID")
		);
	}
}

?>