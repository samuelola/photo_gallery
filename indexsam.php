<?php
session_start(); 
   include'includes/database.php';
  include'includes/photo.php';
  include'includes/user.php';
  include'includes/paginate.php';
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
                $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
                $items_per_page = 8;
                $item_total_count = Photo::count_all();

                $paginate = new Paginate($page,$items_per_page,$item_total_count);

                $sql = "SELECT * FROM photos ";
                $sql .= "LIMIT {$items_per_page} ";
                $sql .= "OFFSET {$paginate->offset()} ";

                $photos = Photo::find_this_query($sql);

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

        <div class="row">
           
           <div class="agileits-services text-center py-5">
             <div class="container py-md-4 mt-md-3">
               <h3 class="heading-agileinfo">GALLERY <span>Providing Higher Education</span></h3>
               <div class="w3ls_gallery_grids mt-md-5 pt-5">
                 <div class="row agileits_w3layouts_gallery_grid">
                  <?php
                   
                   $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
                   $items_per_page = 9;
                   $item_total_count = Photo::count_all();

                   $paginate = new Paginate($page,$items_per_page,$item_total_count);

                   $sql = "SELECT * FROM photos ";
                   $sql .= "LIMIT {$items_per_page} ";
                   $sql .= "OFFSET {$paginate->offset()} ";

                   $photos = Photo::find_this_query($sql);

                   foreach ($photos as $photo) {

                   ?>
                   <div class="col-sm-4  ag_gal agileits_w3layouts_gallery_grid1 w3layouts_gallery_grid1 hover14">

                     <div class="w3_agile_gallery_effect">
                       <a  href="images/<?php echo $photo->filename ?>" class="sb" title="<?php echo $photo->caption ?>">

                        <figure>
                          <img src="images/<?php echo $photo->filename ?>" alt=" " class="img-responsive home_page_photo1 img-fluid">
                        </figure>
                         
                       </a>
                     </div>


                   </div>

                    <?php

                  }
                
                    ?>
                 </div>

               </div>
             </div>
           </div> 

        </div>
        <!-- /.row -->

         <div class="row">
             
               <ul class="pagination">
                 <?php
                   
                     if($paginate->page_total() > 1){
                         
                         if($paginate->has_next()){

                            echo  "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                         }

                         
                           for ($i=1; $i <= $paginate->page_total(); $i++) { 
                             
                              if($i == $paginate->current_page){

                               echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";

                              }
                              else{

                                 echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                              }
                           }
                          

                         

                          if($paginate->has_previous()){

                            echo  "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                         }
                     }
                 ?>
                
                
               </ul>
         </div>

        <hr>

    </div>   
    

  

<?php include 'includes/footer.php' ?>
