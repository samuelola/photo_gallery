<?php

include'../../includes/photo.php';
include'../../includes/comment.php';
include'../../includes/database.php';
include'../../includes/user.php';
include'../../includes/session.php';

if(isset($_GET['delete_user'])){

   $id = $_GET['delete_user'];


   $user = User::find_by_id($id);

   unlink('../../users/'.$user->user_image);

   $user->delete();

    $session->message("User has been deleted!");

   header('Location:../index.php?users');



}

?>