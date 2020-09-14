<?php

// include'../../includes/init.php';

include'../../includes/photo.php';
include'../../includes/comment.php';
include'../../includes/database.php';
include'../../includes/user.php';
include'../../includes/session.php';


if(isset($_GET['delete_photo'])){

   $id = $_GET['delete_photo'];


   $photo = Photo::find_by_id($id);

   unlink('../../images/'.$photo->filename);

   $photo->delete();

   header('Location:../index.php?photos');

}

?>