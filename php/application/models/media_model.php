<?php

class Media_Model extends C3X_Model
{
	public function Media_Model()
	{
		$this->table = "media";
		$this->pk = "id";
    	$this->fields = array(
    		'id' 						=> array("shown"=>false, 	"label"=>"ID"),
    		'title'           			=> array("shown"=>true,     "label"=>"Title"),
    		'description'           	=> array("shown"=>true,     "label"=>"Description"),
            'filename'           		=> array("shown"=>true,     "label"=>"File Name"),
            'media_category_id'         => array("shown"=>true,     "label"=>"Media Category ID"),
            'media_type_id'           	=> array("shown"=>true,     "label"=>"Media Type ID"),
            'href'                      => array("shown"=>true,     "label"=>"Href"),
		);
	}
}

?>