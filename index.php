<?php 
   include'includes/database.php';
  include'includes/photo.php';
  include'includes/user.php';
  
?>


<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                 <div class="thumbnails row">
               <?php 
                $photos = Photo::find_all();

                foreach ($photos as $photo) {
                    
                    ?>
                      
                     
                          
                          <div class="col-xs-6 col-md-3">
                              <a class="thumbnail" href="photo.php?id=<?php echo $photo->id ?>">                
                                  <img class=" img-responsive home_page_photo" src="images/<?php echo $photo->filename ?>" alt="">
                              </a>
                          </div>

                      
                      

                    <?php
                }


               ?>

               </div> 

            </div>

            <!-- Blog Sidebar Widgets Column -->

            
          

        </div>
        <!-- /.row -->

        <hr>

<?php include 'includes/footer.php' ?>
