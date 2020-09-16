<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="index.php?profile">
             
             <?php 
               
               $user_id = $_SESSION['user_id'];

               $user= User::find_by_id($user_id);

               ?><img width="40" height="40" src="../users/<?php echo $user->user_image ?>" alt=""><?php

              ?>
              Profile
          </a>
        </li>
        <li>
            <a href="index.php?users"><i class="fa fa-fw fa-bar-chart-o"></i>Users</a>
        </li>
        <li>
            <a href="index.php?upload"><i class="fa fa-fw fa-table"></i>Uploads</a>
        </li>
        <!-- <li>
            <a href="index.php?comments"><i class="fa fa-fw fa-edit"></i>Comments</a>
        </li> -->

        <li>
            <a href="index.php?comments"><i class="fa fa-fw fa-edit"></i>Comments</a>
        </li>

        <li>
            <a href="index.php?photos"><i class="fa fa-fw fa-edit"></i>Photos</a>
        </li>
       
    </ul>
</div>