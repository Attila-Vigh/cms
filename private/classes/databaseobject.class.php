<?php

class DatabaseObject {

    static protected $database;
    static protected $table_name = "";
    static protected $columns = [];
    public $errors = [];

    static public function set_database($database) {
        self::$database = $database;
    }

    static public function find_by_sql($sql) {

        $result = self::$database->query($sql);
        if(!$result) {
            exit("Database query failed.");
        }
        // results into objects
        $object_array = [];
        while($record = $result->fetch_assoc()) {
            $object = new static;
            foreach($record as $property => $value) {
                if(property_exists($object, $property)) {
                    $object->$property = $value;
                }
            }
            $object_array[] = $object;
        }

        $result->free();

        return $object_array;
    }
    
    static public function find_all($options=[]) {
        $visible = $options['visible'] ?? false;
        $subject_id = $options['subject_id'] ?? false;

        $sql = "SELECT * FROM " . static::$table_name;
        
        if($visible) {
            $sql .= " WHERE visible = true ";
        }
        if($subject_id) {
            $sql .= "AND subject_id='" . self::$database->escape_string($subject_id) . "' ";
        }
        if($visible || $subject_id) {
            $sql .= " ORDER BY position ASC";
        }
        // TODO echo "find all: " . $sql;
        return static::find_by_sql($sql);
    }

    static public function count_all() {
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set = self::$database->query($sql);
        $row = $result_set->fetch_array();
        return array_shift($row);
    }

    static public function find_by_id($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        // TODO echo "find_by_id: " . $sql . "<br>";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    protected function validate() {
        $this->errors = [];

        // Definded in their own class

        return $this->errors;
    }

    public function create() {
        $this->validate();
        if(!empty($this->errors)) { return false; }
    
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = self::$database->query($sql);
        if($result) {
          $this->id = self::$database->insert_id;
        }
        return $result;
    }

    public function update() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public function merge_attributes($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
            }
        }
        }

        // Properties which have database columns, excluding ID
    public function attributes() {
        $attributes = [];
        foreach(static::$columns as $column) {
            if($column == 'id') { continue; }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    protected function sanitized_attributes() {
        $sanitized = [];
        foreach($this->attributes() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    public function delete() {
        $sql = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

        // After deleting, the instance of the object will still
        // exist, even though the database record does not.
        // This can be useful, as in:
        //   echo $user->first_name . " was deleted.";
        // but, for example, we can't call $user->update() after
        // calling $user->delete().
    }
}


?>