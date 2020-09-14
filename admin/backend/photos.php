<div class="container-fluid">
  
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Photos
                
            </h1>
      
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
                            <td>Comments</td>
                        </tr>
                         
                     </thead>
                     <tbody>

                        <?php
                      $user_id = $_SESSION['user_id'];
                        $photos = Photo::find_all();

                        $sn = 0;
                        
                        foreach ($photos as $photo) {
                            
                           $sn +=1;
                           
                           ?>
                           <tr>
                             <td><?php echo $sn ?></td>
                             <td><img width="100" height="100" src="../images/<?php echo $photo->filename ?>" alt="image">
                              
                              <div class="pictures_link">
                                 <?php
                                  echo"<a onClick=\"javascript: return confirm('Do you want to delete?')\" class='del' href='backend/delete_photo.php?delete_photo=$photo->id'>Delete</a>";
                                  ?>
                                  <a href="index.php?edit_photo=<?php echo $photo->id ?>">Edit</a>
                                  <a href="../photo.php?id=<?php echo $photo->id  ?>&user_id=<?php echo $user_id ?> ">View</a>
                              </div>
                             </td>
                             <td><?php echo $photo->title ?></td>
                             <td><?php echo $photo->description ?></td>
                             <td><?php echo $photo->caption ?></td>
                             <td><?php echo $photo->type ?></td>
                             <td><?php echo $photo->size ?></td>
                             <td>
                                <a href="index.php?comments&id=<?php echo $photo->id ?>">
                                <?php

                 
                                   $sql = "SELECT * FROM comments WHERE photo_id = '$photo->id'";

                                   $result = $database->myquery($sql);

                                   // $result = mysqli_query($database->conn,$sql);
                                   
                                   // $comment = comment::find_comment_by_id($photo->id);

                                   $count = $result->num_rows;

                                   echo $count;


                                ?>

                                </a>

                             </td>
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