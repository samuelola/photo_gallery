<div class="container-fluid">

<?php

 $message = "";

if(isset($_POST['add_photo'])){


   $photo = new Photo();

    $photo->title = $_POST['title'];
    $photo->description = $_POST['description'];
    $photo->caption = $_POST['caption'];
    $photo->filename = $_FILES['uploaded_file']['name'];
    $photo->tmp_path = $_FILES['uploaded_file']['tmp_name'];
    $photo->type = $_FILES['uploaded_file']['type'];
    $photo->size = $_FILES['uploaded_file']['size'];


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
            
            <div class="col-md-6">
                
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                         <label for="">Title:</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                     <div class="form-group">
                         <label for="">Photo:</label>
                        <input type="file" name="uploaded_file">
                    </div>

                    <div class="form-group">
                        <textarea name="description" id="" cols="30" rows="10" style="width: 518px; height: 98px;" spellcheck="false" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="add_photo" value="Save" class="btn btn-sm btn-primary">
                    </div>

                </form>

            </div>
           
           

        </div>
    </div>
    <!-- /.row -->

</div>