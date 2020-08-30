<?php 

class User extends Db_object{
	
  protected static $db_table = "users";
  public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	// public function find_all_users(){

	//    global $database;
	   
	//    $result = $database->myquery("SELECT * FROM users");

	//    return $result;	
	// }


	

    public function create(){

    	global $database;

    $sql = "INSERT INTO " .self::$db_table. " (username,password,first_name,last_name) VALUES ('".$database->escape_the_string($this->username)."','".$database->escape_the_string($this->password)."','".$database->escape_the_string($this->first_name)."','".$database->escape_the_string($this->last_name)."')";
        
        $the_result = $database->myquery($sql);

        if($the_result){

        	$this->id = $database->the_insert_id();

        	return true;
        }
        else{

        	return false;
        }
    }


    public function update(){

    	global $database;

    	$sql = "UPDATE " .self::$db_table. " SET username = '".$database->escape_the_string($this->username)."', password = '".$database->escape_the_string($this->password)."', first_name = '".$database->escape_the_string($this->first_name)."',last_name = '".$database->escape_the_string($this->last_name)."' WHERE id = '".$database->escape_the_string($this->id)."'";

    	$database->myquery($sql);

        return  (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }


    public function delete(){

    	global $database;

    	$sql = "DELETE FROM " .self::$db_table. " WHERE id = '".$this->id."' LIMIT 1";

    	$database->myquery($sql);

    	return mysqli_affected_rows($database->conn) == 1 ? true : false;
    }


    public function save(){

        return isset($this->id) ? $this->update() : $this->create();
    }


}

 ?>