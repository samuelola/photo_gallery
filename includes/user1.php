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

		$the_result =  self::find_this_query("SELECT * FROM users WHERE id = '$id'");

		$found_user = mysqli_fetch_assoc($the_result);

		return $found_user;
	}

	public static function find_this_query($sql){
      
      global $database;

      $result = $database->myquery($sql);

      return $result;

	}

    private static  function instantiation($found_user){
           
	       $the_object = new self;
	       // $the_object->id =  $found_user['id'];
	       // $the_object->username =  $found_user['username'];
	       // $the_object->password =  $found_user['password'];
	       // $the_object->first_name =  $found_user['first_name'];
	       // $the_object->last_name =  $found_user['last_name'];

	       foreach ($found_user as $the_attribute => $value) {
	       	
	       	   if($the_object->has_the_attribute($the_attribute)){
                  
                    $the_object->the_attribute = $value;

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