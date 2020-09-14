<?php 

class Session{

  

  public $user_id;	

  public $message;

  public $count;

  function __construct(){

  	 $this->check_message();
     $this->visitor_count();
  }


// note this is a getter function beacause it is getting a private property / method

  public function is_signed_in(){

  	  return $this->sign_in;
  }

  public function login($user){

     if($user){

         $this->user_id = $_SESSION['user_id'] = $user->id; 

         
     }
  }


 

  // this is to check for messgaes

  private function check_message(){

  	 if(isset($_SESSION['message'])){

  	 	$this->message = $_SESSION['message'];
  	 	unset($_SESSION['message']);

  	 }
  	 else{

  	 	$this->message = "";
  	 }
  }


//  set and get the message;

   public function message ($msg =""){

     if(!empty($msg)){
         
         $_SESSION['message'] = $msg;
     }
     else{

      return $this->message="";
     }

  }


  public function visitor_count(){

      if(isset($_SESSION['count'])){

         return $this->count = $_SESSION['count']++;
      }
      else{

         return $_SESSION['count'] = 1;
      }
  }





  // private function check_the_login(){

  //      if(isset($_SESSION['user_id'])){
           
  //            $this->user_id = $_SESSION['user_id'];
  //            $this->sign_in = true;
  //      }
  //      else{

  //      	  unset($this->user_id);
  //      	  $this->sign_in = false;
  //      }
  // }

}


$session = new Session();

// $message = $session->message();

 ?>