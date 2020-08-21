<?php 

class Session{

  private $sign_in = false;

  public $user_id;	

  function __construct(){

  	  session_start();
  	  $this->check_the_login();
  }


// note this is a getter function beacause it is getting a private property / method

  public function is_signed_in(){

  	  return $this->sign_in;
  }

  public function login($user){

     if($user){

         $this->user_id = $_SESSION['user_id'] = $user->id; 

         $this->sign_in = true;
     }
  }


  public function logout(){

  	  unset($_SESSION['user_id']);
  	  unset($this->user_id);
  	  $this->sign_in = false;
  }


  private function check_the_login(){

       if(isset($_SESSION['user_id'])){
           
             $this->user_id = $_SESSION['user_id'];
             $this->sign_in = true;
       }
       else{

       	  unset($this->user_id);
       	  $this->sign_in = false;
       }
  }

}


$session = new Session();


 ?>