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
            'client_logo'                           => array("shown"=>true,     "label"=>"Client Logo"),
            'published'                             => array("shown"=>false,    "label"=>"Published"),
            'date_created'                          => array("shown"=>false,    "label"=>"Date Created")
        );
	}

    function getbycategory( $category = "casestudy" ){
        $query = $this->db->query("SELECT * FROM ( SELECT category_name,category_id,project_id FROM project_category_lu CROSS JOIN categories ON categories.id = project_category_lu.category_id AND category_name = '".$category."' ) AS filtered_lu LEFT JOIN projects ON projects.id = project_id ORDER BY date_created DESC,`order` ASC ");
        return $query->result();
    }

    function getmodules($pid){
        $query = $this->db->query("SELECT module_id,title,heading,subhead,blurb,description,module_type_name FROM project_module_lu LEFT JOIN modules ON project_module_lu.module_id=modules.id LEFT JOIN module_types ON modules.module_type_id=module_types.id WHERE project_id='".$pid."' ORDER BY module_id");
        $modules = $query->result();

        //get media
        foreach ($modules as $key => $module) {
            $query = $this->db->query("SELECT media_id,media_type_name,filename,title,href FROM module_media_lu LEFT JOIN media ON module_media_lu.media_id=media.id LEFT JOIN media_types ON media.media_type_id=media_types.id WHERE module_id='".$module->module_id."' ORDER BY media_id");
            $module->media = $query->result();
        }

        return $modules;
    }

    function getlinks($pid){
        $query = $this->db->query("SELECT link_id,label,href FROM project_link_lu LEFT JOIN links ON project_link_lu.link_id=links.id WHERE project_id='".$pid."' ORDER BY link_id");
        return $query->result();
    }

    function nextproject($pid, $category_slug, $pdate){
        $query = $this->db->query("SELECT slug,project_id FROM projects LEFT JOIN project_category_lu ON projects.id=project_category_lu.project_id LEFT JOIN categories ON categories.id=project_category_lu.category_id WHERE category_name='".$category_slug."' AND date_created < '".$pdate."' AND published='on' ORDER BY date_created DESC,`order` ASC LIMIT 1 ");
        $result = $query->result();
        // echo 'NEXT: ';
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        return !empty( $result ) ? $result[0] : array();
    }

    function previousproject($pid, $category_slug, $pdate){
        $query = $this->db->query("SELECT slug,project_id FROM projects LEFT JOIN project_category_lu ON projects.id=project_category_lu.project_id LEFT JOIN categories ON categories.id=project_category_lu.category_id WHERE category_name='".$category_slug."' AND date_created > '".$pdate."' AND published='on' ORDER BY date_created ASC,`order` DESC LIMIT 1");
        $result = $query->result();
        // echo 'PREV: ';
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        return !empty( $result ) ? $result[0] : array();
    }
}

?>