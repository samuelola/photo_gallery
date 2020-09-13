<?php

if(isset($_GET['delete_user'])){

   $id = $_GET['delete_user'];


   $user = User::find_by_id($id);

   unlink('../../users/'.$user->user_image);

   $user->delete();

   header('Location:../index.php?users');

}

?>