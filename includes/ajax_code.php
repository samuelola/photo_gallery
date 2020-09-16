<?php

  include'photo.php';
  include'comment.php';
  include'database.php';
  include'session.php';
  include'user.php';
  // include'db_object.php';

//  $user = new User();
 $all_photo = new Photo();

// if(isset($_POST['image_name'])){

//    $user_image = $_POST['image_name'];
//    $user_id = $_POST['user_id'];

//    $user = User::find_by_id($user_id);
//    $the_image = $user->user_image;

//    if(empty($user->user_image)){
     
//        $user->user_image = $the_image; 
//    }
   
  
//    $user->ajax_add_photo($user_image,$user_id);

//    // echo $user_image;
// }


// if(isset($_POST['photo_id'])){

//   $photo_id = $_POST['photo_id'];

//   Photo::sidebar_data($photo_id);
// }


if(isset($_POST['image_for_photo'])){

   $photo_image = $_POST['image_for_photo'];
   $photo_id =  $_POST['photo_id'];

   $all_photo->ajax_add_photo($photo_image,$photo_id);

}

 ?>