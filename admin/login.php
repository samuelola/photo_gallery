<?php include'../includes/init.php'; ?>

<?php 

if($session->is_signed_in()){
   
   redirect("index.php");
}


if(isset($_POST['submit'])){

   $username = trim($_POST['username']);
   $password = trim($_POST['password']);


// to check for user in database


$user_found = User::verify_user($username,$password);


 if($user_found){

    $session->login($user_found);
 } 
 else{

 	 $message = "Your password and username is in correct";
 } 


}

else{

	$username = "";
	$password = "";
}

 ?>