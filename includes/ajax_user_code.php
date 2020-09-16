<?php

  include'photo.php';
  include'comment.php';
  include'database.php';
  include'session.php';
  include'user.php';
  // include'db_object.php';

 $user = new User();


if(isset($_POST['image_name'])){

   $user_image = $_POST['image_name'];
   $user_id = $_POST['user_id'];

   $user->ajax_add_user_photo($user_image,$user_id);

 
}


// if(isset($_POST['photo_id'])){

//   $photo_id = $_POST['photo_id'];

//   Photo::sidebar_data($photo_id);
// }




 ?>