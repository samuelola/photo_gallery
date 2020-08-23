<?php 

class Session{

  

  public $user_id;	

  public $message;

  function __construct(){

  	 $this->check_message();
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


  public function message ($msg =""){

     if(!empty($msg)){
         
         $_SESSION['message'] = $msg;
     }
     else{

     	return $this->message="";
     }

  }

  private function check_message(){

  	 if(isset($_SESSION['message'])){

  	 	$this->message = $_SESSION['message'];
  	 	unset($_SESSION['message']);

  	 }
  	 else{

  	 	$this->message = "";
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


 ?>