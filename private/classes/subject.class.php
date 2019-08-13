<?php

class Subject extends DatabaseObject {

    static protected $table_name = 'subjects';
    static protected $columns = ['id', 'icon', 'menu_name', 'position', 'visible'];

    public $id;
    public $icon;
    public $menu_name;
    public $position;
    public $visible;
    
    public function __construct($args=[]) {
        // $this->id = $args['id'] ?? '';
        $this->icon = $args['icon'] ?? '';
        $this->menu_name = $args['menu_name'] ?? '';
        $this->position = $args['position'] ?? '';
        $this->visible = $args['visible'] ?? '';
    
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
