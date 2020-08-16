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
                    
                   // $user = new User;

                   // $result_set = $user->find_all_users();

                   // while ($row = mysqli_fetch_assoc($result_set)) {
                     
                   //    echo $row['username'] . "<br/>";
                   // }




                   // $users = User::find_all_users();

                   // foreach ($users as $user) {
                     
                   //     echo $user->username ."<br>";
                   // }

                   // while ($row = mysqli_fetch_assoc($result_set)) {
                     
                   //    echo $row['username'] . "<br/>";
                   // }

                   // $user = User::find_user_by_id(1);
                   
                   // $jide = User::instantiation($user);

                   // echo $jide->id;

                   // $sammy = User::instantiation();

                   // echo $sammy->id;


                   $user = User::find_user_by_id(2);

                   echo $user->username;


                   // $photo = new Photo();
                   
                 ?>

                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>