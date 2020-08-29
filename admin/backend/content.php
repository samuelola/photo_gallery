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
                  
                  // $user = User::find_user_by_id(8);
                  // $user->delete();

                   $user = User::find_user_by_id(9);

                   $user->username = 'johnnyyyyyyyyyyyyy';

                   $user->save();


                   
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


                    $user = User::find_user_by_id(3);

                    $user->first_name = "ireoluwa";

                    $user->save();

                 ?> 

             </div>
        
    </div>
    <!-- /.row -->

</div>