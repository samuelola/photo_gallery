<?php 
  ob_start();
  session_start();
  include'includes/init.php';

?>

<?php 



if(isset($_POST['submit'])){


   $username = trim($_POST['username']);
   $password = trim($_POST['password']);

   $errors = [];

   if(empty($username)){
     
      $errors['username'] = "Username cannot be empty";
   }

   if(empty($password)){

      $errors['password'] = "Password cannot be empty";
   }


// to check for user in database

  if(empty($errors)){
   
    $user_found = User::verify_user($username,$password);


     if($user_found){

        // $session->login($user_found);

         $_SESSION['user_id'] = $user_found->id;

         header('Location:admin/index.php');
     }
     
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

<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

 <div class="container">

 	<div class="form-gap"></div>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<div class="panel panel-default">
 					<div class="panel-body">
 						<div class="text-center">


 							<h3><i class="fa fa-user fa-4x"></i></h3>
 							<h2 class="text-center">Login</h2>
 							<div class="panel-body">


 								<form  class="form" method="post" action="">

 									<div class="form-group">
 										<div class="input-group">
 											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

 											<input name="username" placeholder="Enter Username" type="text" class="form-control" name="username" value="<?php echo isset($username) ? $username : '' ?>"> 
                      

                      <p class="text-danger"><?php echo isset($errors['username']) ? $errors['username'] : '' ?></p>
 										</div>
 										
 									</div>

 									<div class="form-group">
 										<div class="input-group">
 											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
 											<input name="password" type="password" class="form-control" placeholder="Enter Password" name="password">
 										</div>
                    
                     <p class="text-danger"><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
 									</div>

 									<div class="form-group">

 										<input name="submit" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
 									</div>

                                      <div class="form-group">
                                      	  <a href="forgotpassword.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
                                      </div>
 								</form>

 							</div><!-- Body-->

 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<hr>

 	<?php include 'includes/footer.php' ?>

 </div> <!-- /.container -->