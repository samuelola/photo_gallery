<?php include'frontend/header.php' ?>

    <div id="wrapper">

        <?php include'frontend/nav.php' ?>

        <div id="page-wrapper">

             
            <?php 

                 if($_SERVER['REQUEST_URI'] == '/oop/admin/' || $_SERVER['REQUEST_URI'] == '/oop/admin/index.php'){
                     
                       include 'backend/content.php';
                 }

                 if(isset($_GET['users'])){

                     include 'backend/users.php';
                 }

                 if(isset($_GET['upload'])){

                     include 'backend/upload.php';
                 }

                 if(isset($_GET['comments'])){

                     include 'backend/comments.php';
                 }

                 if(isset($_GET['photos'])){

                     include 'backend/photos.php';
                 }

                 if(isset($_GET['delete_photo'])){

                     include 'backend/delete_photo.php';
                 }

                 if(isset($_GET['edit_photo'])){

                     include 'backend/edit_photo.php';
                 }

                 if(isset($_GET['add_user'])){

                     include 'backend/add_user.php';
                 }

                 if(isset($_GET['edit_user'])){

                     include 'backend/edit_user.php';
                 }

                  if(isset($_GET['delete_user'])){

                     include 'backend/delete_user.php';
                 }



             ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include'frontend/footer.php' ?>
