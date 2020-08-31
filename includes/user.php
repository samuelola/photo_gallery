<?php

include "db_object.php"; 

class User extends Db_object{
	
    protected static $db_table = "users";
    protected static $db_id = "id";
    public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;



	


}

 ?>