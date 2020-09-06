<?php 

class Db_object {

       
		public static function find_all(){

		   return static::find_this_query("SELECT * FROM " . static::$db_table. " ");
		}

		public static function find_by_id($id){

			$the_result_array  =  static::find_this_query("SELECT * FROM " .static::$db_table. "  WHERE id  = '$id'");

	        return !empty($the_result_array) ? array_shift($the_result_array) : false;

	        
		}

		public static function find_comment_by_id($id){

			$the_result_array  =  static::find_this_query("SELECT * FROM " .static::$db_table. "  WHERE photo_id  = '$id'");


	        return !empty($the_result_array) ? array_shift($the_result_array) : false;

	        
		}

		public static function find_comment_by_id_user($user_id){

			$the_result_array  =  static::find_this_query("SELECT * FROM " .static::$db_table. "  WHERE user_id  = '$user_id' ");


	        return !empty($the_result_array) ? array_shift($the_result_array) : false;

	        
		}

		// public static function find_photo_by_id($id){

		// 	$the_result_array  =  static::find_this_query("SELECT * FROM " .static::$db_table. "  WHERE photo_id = '$id'");

	 //        return !empty($the_result_array) ? array_shift($the_result_array) : false;

	        
		// }


		public static function find_this_query($sql){
	      
	      global $database;

	      $result = $database->myquery($sql);

	      $the_object_array = [];

	      while ($row = mysqli_fetch_assoc($result)) {
	      	
	      	  $the_object_array[] = static::instantiation($row);
	      }



	      return  $the_object_array;

		}


	  public static function verify_user($username,$password){

	  	  global $database;

	  	  $username = $database->escape_the_string($username);
	  	  $password = $database->escape_the_string($password);

	  	  $sql = "SELECT * FROM " .static::$db_table. " WHERE ";
	  	  $sql .= "username =  '{$username}' ";
	  	  $sql .= "AND password = '{$password}' ";
	  	  $sql .= "LIMIT 1";

	  	  $the_result_array  =  static::find_this_query( $sql);

	  	  return !empty($the_result_array) ? array_shift($the_result_array) : false;


	  }	

	    public static  function instantiation($the_values){

	    	   $calling_class = get_called_class();
	           
		       $the_object = new  $calling_class;

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


	    public function create_user(){

    	global $database;

    	 move_uploaded_file( $this->tmp_user_path,"../users/$this->user_image");

    $sql = "INSERT INTO " .static::$db_table. " (username,email,password,first_name,last_name,user_image) VALUES ('".$database->escape_the_string($this->username)."','".$database->escape_the_string($this->email)."','".$database->escape_the_string($this->password)."','".$database->escape_the_string($this->first_name)."','".$database->escape_the_string($this->last_name)."','".$database->escape_the_string($this->user_image)."')";
        
        $the_result = $database->myquery($sql);

        if($the_result){

        	$this->id = $database->the_insert_id();

        	return true;
        }
        else{

        	return false;
        }
    }


      public function create_photo(){

    	global $database;



      move_uploaded_file( $this->tmp_path,"../images/$this->filename");
   

    $sql = "INSERT INTO " .static::$db_table. " (title,description,filename,type,size,caption) VALUES ('".$database->escape_the_string($this->title)."','".$database->escape_the_string($this->description)."','".$database->escape_the_string($this->filename)."','".$database->escape_the_string($this->type)."', '".$database->escape_the_string($this->size)."','".$database->escape_the_string($this->caption)."')";
        
        $the_result = $database->myquery($sql);



        if($the_result){

        	$this->id = $database->the_insert_id();

        	return true;
        }
        else{

        	return false;
        }
    }


       public function create_comment(){

    	global $database;   

    $sql = "INSERT INTO " .static::$db_table. " (photo_id,user_id,author,body,comment_date) VALUES ('".$database->escape_the_string($this->photo_id)."','".$database->escape_the_string($this->user_id)."','".$database->escape_the_string($this->author)."' ,'".$database->escape_the_string($this->body)."' ,NOW())";
        
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

    	$sql = "UPDATE " .static::$db_table. " SET username = '".$database->escape_the_string($this->username)."', email = '".$database->escape_the_string($this->email)."', password = '".$database->escape_the_string($this->password)."', first_name = '".$database->escape_the_string($this->first_name)."',last_name = '".$database->escape_the_string($this->last_name)."',user_image = '".$database->escape_the_string($this->user_image)."' WHERE id  = '".$database->escape_the_string($this->id)."'";

    	$database->myquery($sql);

        return  (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }

    public function update_photo(){

    	global $database;

    	$sql = "UPDATE " .static::$db_table. " SET title = '".$database->escape_the_string($this->title)."', description = '".$database->escape_the_string($this->description)."', filename = '".$database->escape_the_string($this->filename)."',type = '".$database->escape_the_string($this->type)."',size = '".$database->escape_the_string($this->size)."' ,caption = '".$database->escape_the_string($this->caption)."' WHERE id  = '".$database->escape_the_string($this->id)."'";

    	$database->myquery($sql);

        return  (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }




    public function delete(){

    	global $database;

    	$sql = "DELETE FROM " .static::$db_table. " WHERE id = '".$this->id."' LIMIT 1";

    	$database->myquery($sql);

    	return mysqli_affected_rows($database->conn) == 1 ? true : false;
    }


    public function save(){

        return isset($this->id) ? $this->update() : $this->create();
    }


   public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }




  public static function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}


    

}


?>