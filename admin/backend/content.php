<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading 

                </small>

            </h1>
            <ol class="breadcrumb">

                
                <?php 
                    
                   $sam = User::find_user_by_id($user_id);

                  echo  $sam->username;
                   
                 ?>

                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>

        
          
             <div class="container">
                
                <?php
                  
                   // $user = new User();

                   // $user->username = "testing";
                   // $user->password = "testingpassword";
                   // $user->first_name = "testingfirstname";
                   // $user->last_name = "testinglastname";

                   // $user->create();


                   // $user  = User::find_user_by_id(3);

                   // $user->last_name = "ire";

                   // $user->update();


                    $user = User::find_user_by_id(5);

                    $user->delete();

                 ?> 

             </div>
        
    </div>
    <!-- /.row -->

</div>