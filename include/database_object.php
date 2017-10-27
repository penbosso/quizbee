<?php
require_once(LIB_PATH.DS.'database.php');

// common database objects including:
// find, count all records in table, find by specifics,
// instantiate a class, check and sanitize attributes of a class,
// create, save, update and delete from database table

class DatabaseObject
{

    //common database methods
    public static function find_all()
    {
        return static::find_by_sql("SELECT * FROM ".static::$table_name);
    }
    public static function find_by_id($id=0)
    {
        global $database;
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id=".$database->escape_value($id)." LIMIT 1");
        return !empty($result_array)? array_shift($result_array) : false;
    }
    public static function find_by_sql($sql="")
    {
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while ($row = $database->fetch_array($result_set)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }
    public static function count_all()
    {
        global $database;
        $sql = "SELECT COUNT(*) FROM ".static::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
    public static function instantiate($record)
    {
        $object  = new static;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        // $object->id         = $record['id'];
        // $object->username   = $record['username'];
        // $object->password   = $record['password'];
        // $object->first_name = $record['first_name'];
        // $object->last_name  = $record['last_name']
        return $object;
    }
    private function has_attribute($attribute)
    {
        $object_vars =$this->attribute();
        return array_key_exists($attribute, $object_vars);
    }
    protected function attribute()
    {
        $attribute = array();
        foreach (static::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attribute[$field] = $this->$field;
            }
            if($attribute['id']==""){
                $attribute['id']     = 0;
            }
        }
        return $attribute;
    }
    protected function sanitized_attribute()
    {
        global $database;
        $clean_attribute = array();
        foreach ($this->attribute() as $key => $value) {
            $clean_attribute[$key] = $database->escape_value($value);
        }
        return $clean_attribute;
    }
    public function create()
    {
        global $database;
        $attribute = $this->sanitized_attribute();

        $sql = "INSERT INTO ".static::$table_name." (";
        // $sql .= "username, password, first_name, last_name";
        $sql .= join(", ", array_keys($attribute));
        $sql .=") VALUES ('";
        $sql .= join("', '", array_values($attribute));
        $sql .= "')";
        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }
    public function save()
    {
        return isset($this->id)? $this->update():$this->create();
    }
    public function destroy()
    {
        // remove the database entry
        if ($this->delete()) {
            //remove the file
            $target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
            return unlink($target_path) ? true : false;
        }
    }
    protected function update()
    {
        global $database;
        $attribute = $this->sanitized_attribute();
        $attribute_pairs = array();

        foreach ($attribute as $key=> $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE ".static::$table_name." SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .=" WHERE id = ".$database->escape_value($this->id);
        $database->query($sql);
        return ($database->affected_rows() ==1) ? true:false;
    }
    protected function delete()
    {
        global $database;
        $sql = "DELETE FROM ".static::$table_name;
        $sql .= " WHERE id =". $database->escape_value($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() ? true: false);
    }
}
?>
