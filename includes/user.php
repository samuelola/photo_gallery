<?php

include "db_object.php"; 

class User extends Db_object{
	
    protected static $db_table = "users";
    public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;



	


}

 ?>