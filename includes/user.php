<?php 

class User{

	public $username;
	public $password;
	public $first_name;
	public $last_name;

	// public function find_all_users(){

	//    global $database;
	   
	//    $result = $database->myquery("SELECT * FROM users");

	//    return $result;	
	// }


	public static function find_all_users(){

	   return self::find_this_query("SELECT * FROM users");
	}

	public static function find_user_by_id($id){

		$the_result_array  =  self::find_this_query("SELECT * FROM users WHERE id = '$id'");

		// if(!empty($the_result_array )){
           
  //          $first_item = array_shift($the_result_array);

  //          return $first_item;

		// }
		// else{

		// 	return false;
		// }

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

        
		// return $found_user;
	}

	public static function find_this_query($sql){
      
      global $database;

      $result = $database->myquery($sql);

      $the_object_array = [];

      while ($row = mysqli_fetch_assoc($result)) {
      	
      	  $the_object_array[] = self::instantiation($row);
      }



      return  $the_object_array;

	}


  public static function verify_user($username,$password){

  	  global $database;

  	  $username = $database->escape_the_string($username);
  	  $password = $database->escape_the_string($password);

  	  $sql = "SELECT * FROM users WHERE ";
  	  $sql .= "username =  '{$username}' ";
  	  $sql .= "AND password = '{$password}' ";
  	  $sql .= "LIMIT 1";

  	  $the_result_array  =  self::find_this_query( $sql);

  	  return !empty($the_result_array) ? array_shift($the_result_array) : false;


  }	

    public static  function instantiation($the_values){
           
	       $the_object = new self;
	       // $the_object->id =  $found_user['id'];
	       // $the_object->username =  $found_user['username'];
	       // $the_object->password =  $found_user['password'];
	       // $the_object->first_name =  $found_user['first_name'];
	       // $the_object->last_name =  $found_user['last_name'];

	       foreach ($the_values as $the_attribute => $value) {
	       	
	       	   if($the_object->has_the_attribute($the_attribute)){
                  
                    $the_object->$the_attribute = $value;

	       	   }
	       }


	       return $the_object;
       
    }


    private  function has_the_attribute($the_attribute){

       $object_properties = get_object_vars($this);

       return array_key_exists($the_attribute, $object_properties); 

    }


}

 ?>