<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Photos
                
            </h1>
           <?php

               // if(isset($_SESSION['msg'])){
                 
               //     echo $_SESSION['msg'];
               // } 
               // elseif($_SESSION['msg'] = ''){

               //     unset($_SESSION['msg']);
               // }

              

           ?>
            <div class="col-md-12">
                <table class="table table-responsive table-striped">
                     <thead>
                        <tr>
                            <td>Sn</td>
                            <td>Photo</td>
                            <td>Title</td>
                            <td>Caption</td>
                            <td>Description</td>
                            <td>Type</td>
                            <td>Size</td>
                        </tr>
                         
                     </thead>
                     <tbody>

                        <?php

                        $photos = Photo::find_all();

                        $sn = 0;
                        
                        foreach ($photos as $photo) {
                            
                           $sn +=1;
                           
                           ?>
                           <tr>
                             <td><?php echo $sn ?></td>
                             <td><img width="100" height="100" src="../images/<?php echo $photo->filename ?>" alt="image">
                              
                              <div class="pictures_link">
                                  <a class="del" href="backend/delete_photo.php?delete_photo=<?php echo $photo->id ?>">Delete</a>
                                  <a href="index.php?edit_photo&edit_photo=<?php echo $photo->id ?>">Edit</a>
                                  <a href="#">View</a>
                              </div>
                             </td>
                             <td><?php echo $photo->title ?></td>
                             <td><?php echo $photo->description ?></td>
                             <td><?php echo $photo->caption ?></td>
                             <td><?php echo $photo->type ?></td>
                             <td><?php echo $photo->size ?></td>
                           </tr>

                           <?php


                        }
                         
                         
                        ?>
                         
                     </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>