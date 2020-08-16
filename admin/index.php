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



             ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include'frontend/footer.php' ?>
