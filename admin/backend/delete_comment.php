<?php

// include'../../includes/init.php';

include'../../includes/photo.php';
include'../../includes/comment.php';
include'../../includes/database.php';
include'../../includes/user.php';


if(isset($_GET['delete_comment'])){

   $id = $_GET['delete_comment'];


   $comment = Comment::find_by_id($id);


   $comment->delete();

   header('Location:../index.php?comments');

}

?>