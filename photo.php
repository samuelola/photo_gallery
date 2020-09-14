<?php
include'includes/photo.php';
include'includes/comment.php';
include'includes/database.php';
include'includes/user.php';
// include'./includes/db_object.php';
 // include 'includes/init.php' 

 ?>

<?php
 $comment = new Comment();
if(isset($_GET['id']) && isset($_GET['user_id'])){

  $photo_id = $_GET['id'];
  
  $user_id = $_GET['user_id'];


  $photo = Photo::find_by_id($photo_id);

  $the_photo_id = $photo->id;

  if(isset($_POST['addcomment'])){

   $errors = [];

    $comment->user_id = $user_id;
    $comment->photo_id = $the_photo_id;

    $comment->author = trim($_POST['comment_name']);

    $comment->body = trim($_POST['comment_body']);

    // $comment->comment_date =  NOW();

    if(empty($comment->author)){

       $errors['comment_name'] = "Author field cannot be empty!";
    }
    if(empty($comment->body)){

       $errors['comment_body'] = "Body field cannot be empty!"; 
    }

    // $the_date = date('Y-m-d');
    // date_format(attend_date,'%b %e %Y') as sam_date 

    if(empty($errors)){
      
        $comment->create_comment();

        header('Location:photo.php?user_id='.$user_id.'&id='.$the_photo_id);
    }

  }

}
else{

    header('Location:index.php');
}



?>

<?php include 'includes/header.php' ?>


    <!-- Navigation -->
  <?php include 'includes/nav.php' ?>  

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php 
                 $photo = Photo::find_by_id($the_photo_id);
             ?>

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title ?></h1>

                <!-- Author -->
              

                <hr>

                <!-- Date/Time -->
               <!--  <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p> -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php Photo::date_for_comment($photo->photo_date) ?></p>
                <!-- <hr> -->

                <!-- Preview Image -->
                  <img width="100%"  class="img-responsive" src="images/<?php echo $photo->filename ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption ?></p>

                <p><?php echo $photo->description ?> </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" action="" role="form">
                   
                        <div class="form-group">
                           <input type="text" name="comment_name" class="form-control" placeholder="Enter Author Name">
                           <p class="text-danger"> <?php echo isset($errors['comment_name']) ? $errors['comment_name'] : '' ?></p>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_body" placeholder="Enter Body"></textarea>
                           <p class="text-danger"> <?php echo isset($errors['comment_body']) ? $errors['comment_body'] : '' ?></p>
                        </div>
                        <button type="submit" name="addcomment" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
            
                  <?php

                  // if(isset($_SESSION['user_id'])){

                  //    $sam_id = $_SESSION['user_id'];

                  //     $comment_select = Comment::find_comment_by_id_user($sam_id);

                     

                  // }

                   $comment = Comment::find_comment_by_id($photo_id); 

                   $the_show_comment = Comment::count_comment($photo_id);

                   if($the_show_comment >= 1){
                     
                     ?>

                       <div class="media">
                           <a class="pull-left" href="#">
                              <!--  <img class="media-object" src="users/<?php echo  isset($comment_select_image->user_image) ? $comment_select_image->user_image : 'image' ?>" alt=""> -->
                              <img class="media-object" src="images/co.png" alt="">
                           </a>
                           <div class="media-body">
                               <h4 class="media-heading"><?php echo isset($comment->author) ? $comment->author : '' ?>
                                   <small>

                                       <?php
                                         
                                           Comment::date_for_comment($comment->comment_date );


                                        ?>
                                           
                                   </small>

                               </h4>
                              <?php echo $comment->body ?>
                           </div>
                           
                       </div>

                     <?php

                   }
                   else{
                    
                   }
                       
                      


                

                    ?>  

                    
                    

                      
                 
                   

               <!--   date_format($comment->comment_date,"Y/m/d H:i:s"); -->
               
                
                <!-- Comment -->

              



            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <!--  <?php include' includes/sidebar.php' ?> -->

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
 
<?php include 'includes/footer.php' ?>
