<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center bg-success"><?php echo  $session->message ?></div>
            <h1 class="page-header">

                Profile 
                
            </h1>
            <div class="col-md-12">
                <table class="table table-responsive table-striped">
                     <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            
                        </tr>
                         
                     </thead>
                     <tbody>

                        <?php

                        $user_id = $_SESSION['user_id'];

                        $user = User::find_by_id($user_id);

                        $sn = 0;
                        
                        
                            
                           $sn +=1;
                           
                           ?>
                           <tr>
                             <td><?php echo $sn ?></td>
                             <td><img class="user_image" width="100" height="100"  src="../images/<?php echo $user->user_image ?>" alt="image"></td>
                             <td>
                                <?php echo $user->username ?><br>
                                <a onclick="javascript: return confirm('Do you want to delete?')" class="del" href="backend/delete_user.php?delete_user=<?php echo $user->id ?>">Delete</a>
                                <a href="index.php?edit_user=<?php echo $user->id ?>">Edit</a>
                                <a href="#">View</a> 
                             </td>
                             <td><?php echo $user->first_name ?></td>
                             <td><?php echo $user->last_name ?></td>
                             <td><?php echo $user->email ?></td>
                           </tr>

                           <?php


                        
                         
                         
                        ?>
                         
                     </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>