<div class="container-fluid">

<?php

 $message = "";

if(isset($_FILES['file'])){


   $photo = new Photo();

    $photo->title = $_POST['title'];
    $photo->description = $_POST['description'];
    $photo->caption = $_POST['caption'];
    $photo->filename = $_FILES['file']['name'];
    $photo->tmp_path = $_FILES['file']['tmp_name'];
    $photo->type = $_FILES['file']['type'];
    $photo->size = $_FILES['file']['size'];


    if($photo->create_photo()){

       $message = "Photo Successfully created!";

    } 

}

?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
             <?php echo $message; ?>
            <h1 class="page-header">
                Upload
                <small>Subheading</small>
            </h1>

            <div class="row"><!--begining  of row -->
                
                <div class="col-md-6 col-md-offset-3">
                    
                    <form action="index.php?upload" method="post" enctype="multipart/form-data" >
                        
                        <div class="form-group">
                             <label for="">Title:</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                         <div class="form-group">
                             <label for="">Caption:</label>
                            <input type="text" name="caption" class="form-control">
                        </div>

                         <div class="form-group">
                             <label for="">Photo:</label>
                            <input type="file" name="file">
                        </div>

                        <div class="form-group">
                            <textarea name="description" id="" cols="30" rows="10" style="width: 518px; height: 98px;" spellcheck="false" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="add_photo" value="Save" class="btn btn-sm btn-primary">
                        </div>

                    </form>

                </div><!--end of row -->


                <div class="row">
                    
                    <div class="col-lg-12">
                        <form action="index.php?upload"  class="dropzone" >
                            
                        </form>
                    </div>

                </div>

            </div>
            
            
           
           

        </div>
    </div>
    <!-- /.row -->

</div>