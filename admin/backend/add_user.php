<div class="container-fluid">

<?php

 $message = "";

if(isset($_FILES['file'])){

    $user = new User();

    $user->username = $_POST['username'];
    $user->first_name = $_POST['firstname'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->last_name = $_POST['lastname'];
    $user->user_image = $_FILES['file']['name'];
    $user->tmp_user_path = $_FILES['file']['tmp_name'];
    


    if($user->create_user()){

       $message = "<h3 class='text-center text-danger'>User Successfully created!</h3>";

    } 

}

?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
             <?php echo $message; ?>
            <h1 class="page-header">
                Add User
               
            </h1>
            
            <div class="col-md-6 col-md-offset-3">
                
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                         <label for="">Username:</label>
                        <input type="text" name="username" class="form-control">
                    </div>

                    <div class="form-group">
                         <label for="">Firstname:</label>
                        <input type="text" name="firstname" class="form-control">
                    </div>

                    <div class="form-group">
                         <label for="">Lastname:</label>
                        <input type="text" name="lastname" class="form-control">
                    </div>

                    <div class="form-group">
                         <label for="">Email:</label>
                        <input type="text" name="email" class="form-control">
                    </div>


                     <div class="form-group">
                         <label for="">Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                   
                    

                     <div class="form-group">
                         <label for="">Photo:</label>
                        <input type="file" name="file">
                    </div>


                    <div class="form-group">
                        <input type="submit" name="add_user" value="Save" class="btn btn-sm btn-primary">
                    </div>

                </form>

            </div>
           
           

        </div>
    </div>
    <!-- /.row -->


     <!--  <div class="row">
                    
        <div class="col-lg-12">
            <form action="index.php?add_user"  class="dropzone" >
                
            </form>
        </div>

    </div> -->


</div>