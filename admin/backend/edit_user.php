<?php

if(isset($_GET['edit_user'])){
  
   $id = $_GET['edit_user'];

   $user = User::find_by_id($id);
}

$message = "";

if(isset($_POST['update_user'])){

   $id = $_GET['edit_user'];
   $user = User::find_by_id($id);
   $the_image = $user->user_image;
   $user->username = $_POST['username'];
   $user->email = $_POST['email'];
   $user->password = $_POST['password'];
   $user->first_name = $_POST['firstname'];
   $user->last_name = $_POST['lastname'];
   $user->user_image = $_FILES['user_image']['name'];
   $user->tmp_user_path = $_FILES['user_image']['tmp_name'];

   if(empty($user->user_image)){
     
       $user->user_image = $the_image; 
   }

   move_uploaded_file($user->tmp_user_path,"../users/$user->user_image");

  
   if($user->update()){

       $session->message("User has been updated!");
   
    } 

   header('Location:index.php?users');

  
   
}

?>

<!--user modal -->



<div class="container-fluid">
     
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit User | <a style="text-decoration: none;font-size: 16px" href="index.php?users">View Users</a>
               

            </h1>
           
           <div class="col-md-4 user_image_box">
               
             <a href="#" data-toggle="modal" data-target="#photo_library"><img class="img-thumbnail img-responsive" width="150" height="150" src="../users/<?php echo $user->user_image ?>" alt="image" ></a>

           </div>

           <div class="col-md-8">
              <form action="" method="post" enctype="multipart/form-data">
                  
                  <div class="form-group">
                       <label for="">Username:</label>
                      <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control">
                  </div>

                  <div class="form-group">
                       <label for="">Firstname:</label>
                      <input type="text" name="firstname" class="form-control" value="<?php echo $user->first_name ?>">
                  </div>

                  <div class="form-group">
                       <label for="">Lastname:</label>
                      <input type="text" name="lastname" class="form-control" value="<?php echo $user->last_name ?>">
                  </div>

                  <div class="form-group">
                       <label for="">Email:</label>
                      <input type="text" name="email" value="<?php echo $user->email ?>" class="form-control">
                  </div>


                   <div class="form-group">
                       <label for="">Password:</label>
                      <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>">
                  </div>

                 
                  

                   <div class="form-group">
                       <label for="">Photo:</label>
                      <input type="file" name="user_image">
                  </div>


                  <div class="form-group">
                       <input type="submit" name="update_user" value="Update" class="btn btn-sm btn-primary ">
                      <a id="user-id" onclick="javascript: return confirm('Do you want to delete?')"  href="backend/delete_user.php?delete_user=<?php echo $user->id ?>" class="btn btn-sm btn-danger pull-right ">Delete</a>
                     
                  </div>

              </form>
           </div>

        </div>

        
        </form> 
         
    </div>
    <!-- /.row -->

</div>

