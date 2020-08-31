<?php

include'../../includes/init.php';



if(isset($_GET['delete_photo'])){

   $id = $_GET['delete_photo'];


   $photo = Photo::find_by_id($id);

   unlink('../../images/'.$photo->filename);

   $photo->delete();

   header('Location:../index.php?photos');

}

?>