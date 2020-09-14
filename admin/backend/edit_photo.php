<?php

if(isset($_GET['edit_photo'])){
  
   $id = $_GET['edit_photo'];

   $photo = Photo::find_by_id($id);
}

$message = "";

if(isset($_POST['update'])){

   $id = $_GET['edit_photo'];
   $photo = Photo::find_by_id($id);

   $photo->title = $_POST['title'];
   $photo->caption = $_POST['caption'];
   $photo->description = $_POST['description'];
   if($photo->update_photo()){

       $message = "<h3 class='text-danger text-center'>Photo Successfully updated!</h3>";

       $_SESSION['msg'] = $message;

    } 

   header('Location:index.php?photos');
   
}

?>

<div class="container-fluid">
     
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Photo
               

            </h1>
           
           <div class="col-md-8">
               
               <form action="" method="post" enctype="multipart/form-data">
                   
                   <div class="form-group">
                      <label for="">Title:</label>
                       <input type="text" name="title" class="form-control" value="<?php echo $photo->title ?>">
                   </div>

                   <div class="form-group">
                      <a class="photo_image"  href=""><img style="width: 100%" class="thumbnail" src="../images/<?php echo $photo->filename ?>" alt=""></a>
                   </div>
                   
                    <div class="form-group">
                      <label for="">Caption:</label>
                       <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption ?>">
                   </div>


                   <div class="form-group">
                       <textarea name="description" id="" cols="30" rows="10" spellcheck="false" class="form-control"><?php echo $photo->description ?></textarea>
                   </div>

                  

              

           </div>

           <div class="col-md-4">
                   <div  class="photo-info-box">
                       <div class="info-box-header">
                          <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                       </div>
                      <div class="inside">
                     <div class="box-inner">
                        <p class="text">
                          <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                         </p>
                         <p class="text ">
                           Photo Id: <span class="data photo_id_box"><?php echo $photo->id ?></span>
                         </p>
                         <p class="text">
                           Filename: <span class="data"><?php echo $photo->filename ?></span>
                         </p>
                        <p class="text">
                         File Type: <span class="data"><?php echo $photo->type ?></span>
                        </p>
                        <p class="text">
                          File Size: <span class="data"><?php echo $photo->size ?></span>
                        </p>
                     </div>
                     <div class="info-box-footer clearfix">
                       <div class="info-box-delete pull-left">
                           
                           <?php
                         echo "<a onClick=\"javascript: return confirm('Do you want to delete?')\" href='backend/delete_photo.php?delete_photo=$photo->id' class='btn btn-danger btn-lg '>Delete</a>";
                           ?>   
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