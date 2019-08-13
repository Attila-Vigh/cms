<?php

class WebPage extends DatabaseObject {

    static protected $table_name = 'pages';
    static protected $columns = ['id', 'subject_id', 'menu_name', 'icon','position', 'visible', 'content'];

    public $id;
    public $menu_name;
    public $subject_id;
    public $icon;
    public $position;
    public $visible;
    public $content;
    
    public function __construct($args=[]) {
        //$this->menu_name = isset($args['menu_name']) ? $args['menu_name'] : '';
        $this->menu_name =  $args['menu_name']  ?? '';
        $this->subject_id = $args['subject_id'] ?? '';
        $this->icon =       $args['icon'] ?? '';
        $this->position =   $args['position']   ?? '';
        $this->visible =    $args['visible']    ?? '';
        $this->content =    $args['content']    ?? '';
    
        // Caution: allows private/protected properties to be set
        // foreach($args as $k => $v) {
        //   if(property_exists($this, $k)) {
        //     $this->$k = $v;
        //   }
        // }
    }

    static public function find_by_subject_id($subject_id/*, $options=[]*/) {
        // $visible = $options['visible'] ?? false;

        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE subject_id='" . self::$database->escape_string($subject_id) . "' ";
        // TODO
        // if($visible) {
        //   $sql .= "AND visible = true ";
        // }
        $sql .= "ORDER BY position ASC";
        // TODO echo $sql;
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) { 
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

        protected function validate() {
            $this->errors = [];

            if(is_blank($this->menu_name)) {
                $this->errors[] = "menu_name cannot be blank.";
            }
            return $this->errors;
    }

}

?>
