<?php

class Projects_Model extends C3X_Model
{
    var $lu_key = "project";

	public function Projects_Model()
	{
		$this->table = "projects";
		$this->pk = "id";
    	$this->fields = array(
            'id'                                    => array("shown"=>false,    "label"=>"ID"),
            'slug'                                  => array("shown"=>false,    "label"=>"Slug"),
            'title'                                 => array("shown"=>true,     "label"=>"Title"),
            'heading'                               => array("shown"=>true,     "label"=>"Heading"),
            'subhead'                               => array("shown"=>true,     "label"=>"Subhead"),
            'description'                           => array("shown"=>true,     "label"=>"Description"),
            'thumbnail_image'                       => array("shown"=>true,     "label"=>"Thumbnail Image"),
            'detail_name'                           => array("shown"=>true,     "label"=>"Detail Name"),
            'client_logo'                           => array("shown"=>true,     "label"=>"Client Logo")
        );
	}

    function getbycategory( $category = "casestudy" ){
        $query = $this->db->query("SELECT * FROM ( SELECT category_name,category_id,project_id FROM projects_category_lu CROSS JOIN categories ON categories.id = projects_category_lu.category_id AND category_name = '".$category."' ) AS filtered_lu LEFT JOIN projects ON projects.id = project_id ORDER BY `order`");
        return $query->result();
    }

    function getassets($pid){
        $query = $this->db->query("SELECT asset_id,title,heading,subhead,blurb,description,asset_type_name FROM projects_asset_lu LEFT JOIN assets ON projects_asset_lu.asset_id=assets.id LEFT JOIN asset_types ON assets.asset_type_id=asset_types.id WHERE project_id='".$pid."' ORDER BY asset_id");
        $assets = $query->result();

        //get media
        foreach ($assets as $key => $asset) {
            $query = $this->db->query("SELECT media_id,media_type_name,filename,title FROM assets_media_lu LEFT JOIN media ON assets_media_lu.media_id=media.id LEFT JOIN media_types ON media.media_type_id=media_types.id WHERE asset_id='".$asset->asset_id."' ORDER BY media_id");
            $asset->media = $query->result();
        }

        return $assets;
    }

    function getlinks($pid){
        $query = $this->db->query("SELECT link_id,label,href FROM projects_link_lu LEFT JOIN links ON projects_link_lu.link_id=links.id WHERE project_id='".$pid."' ORDER BY link_id");
        return $query->result();
    }

    function nextproject($pid, $category_slug){
        $query = $this->db->query("SELECT slug,project_id FROM projects LEFT JOIN projects_category_lu ON projects.id=projects_category_lu.project_id LEFT JOIN categories ON categories.id=projects_category_lu.category_id WHERE category_name='".$category_slug."' AND project_id > '".$pid."' ORDER BY project_id LIMIT 1");
        $result = $query->result();
        return !empty( $result ) ? $result[0] : array();
    }

    function previousproject($pid, $category_slug){
        $query = $this->db->query("SELECT slug,project_id FROM projects LEFT JOIN projects_category_lu ON projects.id=projects_category_lu.project_id LEFT JOIN categories ON categories.id=projects_category_lu.category_id WHERE category_name='".$category_slug."' AND project_id < '".$pid."' ORDER BY project_id DESC LIMIT 1");
        $result = $query->result();
        return !empty( $result ) ? $result[0] : array();
    }
}

?>