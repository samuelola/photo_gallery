<div class="container-fluid">

<?php

 $message = "";

$photo_op = new Photo();

if(isset($_FILES['file'])){

    $photo_op->title = $_POST['title'];
    $photo_op->description = $_POST['description'];
    $photo_op->caption = $_POST['caption'];
    $photo_op->filename = $_FILES['file']['name'];
    $photo_op->tmp_path = $_FILES['file']['tmp_name'];
    $photo_op->type = $_FILES['file']['type'];
    $photo_op->size = $_FILES['file']['size'];


    if($photo_op->create_photo()){

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