<?php

if(isset($_GET['edit_photo'])){
  
   $id = $_GET['edit_photo'];

  
}

$message = "";

if(isset($_POST['update'])){

   $id = $_GET['edit_photo'];
   $photo = Photo::find_by_id($id);
   $the_image = $photo->filename;
   $photo->title = $_POST['title'];
   $photo->caption = $_POST['caption'];
   $photo->description = $_POST['description'];
   $photo->filename = $_FILES['photo_image']['name'];
   $photo->tmp_path = $_FILES['photo_image']['tmp_name'];
   $photo->size = $_FILES['photo_image']['size'];
   $photo->type = $_FILES['photo_image']['type'];

   if(empty($photo->filename)){
      
      $photo->filename = $the_image;
   }

   move_uploaded_file($photo->tmp_path,"../images/$photo->filename");

   if($photo->update_photo()){

       $message = "<h3 class='text-danger text-center'>Photo Successfully updated!</h3>";

      

    } 

   // header('Location:index.php?photos');
   
}

?>

<?php include "frontend/the_photo_modal.php" ?>


<div class="container-fluid">
     
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
           <?php echo $message; ?>
            <h1 class="page-header">
                Edit Photo
               

            </h1>
           <?php  $the_photo = Photo::find_by_id($id); ?>
           <div class="col-md-8">
               
               <form action="" method="post" enctype="multipart/form-data">
                   
                   <div class="form-group">
                      <label for="">Title:</label>
                       <input type="text" name="title" class="form-control" value="<?php echo $the_photo->title ?>">
                   </div>

                   <div class="form-group" id="image_box">
                      <label for="">Photo:</label>
                      <a class="photo_image"  href="#" data-toggle="modal" data-target="#the_photo_library"><img style="width: 100%" class="thumbnail" src="../images/<?php echo $the_photo->filename ?>" alt=""></a>

                      <input type="file" name="photo_image">

                   </div>

               
                   
                    <div class="form-group">
                      <label for="">Caption:</label>
                       <input type="text" name="caption" class="form-control" value="<?php echo $the_photo->caption ?>">
                   </div>


                   <div class="form-group">
                       <textarea name="description" id="" cols="30" rows="10" spellcheck="false" class="form-control"><?php echo $the_photo->description ?></textarea>
                   </div>


                  

                  

              

           </div>

           <div class="col-md-4">
                   <div  class="photo-info-box">
                       <div class="info-box-header">

                          <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-down pull-right"></span></h4>
                       </div>
                      <div class="inside">
                     <div class="box-inner">
                        <p class="text">
                          <span class="glyphicon glyphicon-calendar"></span> <?php echo photo::date_for_comment($photo->photo_date) ?>
                         </p>
                         <p class="text ">
                           Photo Id: <span class="data photo_id_box"><?php echo $the_photo->id ?></span>
                         </p>
                         <p class="text">
                           Filename: <span class="data"><?php echo $the_photo->filename ?></span>
                         </p>
                        <p class="text">
                         File Type: <span class="data"><?php echo $the_photo->type ?></span>
                        </p>
                        <p class="text">
                          File Size: <span class="data"><?php echo $the_photo->size ?></span>
                        </p>
                     </div>
                     <div class="info-box-footer clearfix">
                       <div class="info-box-delete pull-left">
                           
                          
                         <a id="photo-id" onClick="javascript: return confirm('Do you want to delete?')" href="backend/delete_photo.php?delete_photo=<?php echo $the_photo->id ?>" class="btn btn-danger btn-lg">Delete</a>
                           
                       </div>
                       <div class="info-box-update pull-right ">
                           <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                       </div>   
                     </div>
                      </div>          
                   </div>
           </div>

        </div>

        
          
         
    </div>
    <!-- /.row -->

</div>