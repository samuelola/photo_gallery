<div class="container-fluid">
<?php

if(isset($_GET['id'])){
  
   $photo_id = $_GET['id'];

   $comment = Comment::find_comment_by_id($photo_id);

   $count_comment = Comment::count_comment($photo_id);

   ?>
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">
                 Comments
                
             </h1>

             <div class="col-md-12">
                
                 <?php

                 if($count_comment >= 1){

                  ?> 
                  <table class="table table-responsive table-striped">
                       <thead>
                          <tr>
                              <th>Sn</th>
                              <th>Author </th>
                              <th>Comment</th>
                              <th>Comment Date</th>
                              <th>Action</th>
                              
                          </tr>
                           
                       </thead>
                       <tbody>

                          <?php

                       
                             $sn = 0;
                          
                  
                             $sn +=1;
                         

                               ?>
                               <tr>
                                 <td><?php echo $sn ?></td>
                                 <td><?php echo $comment->author ?></td>
                                 <td><?php echo $comment->body ?></td>
                                 <td><?php Comment::date_for_comment($comment->comment_date ); ?></td>
                                 
                                 <td>
                                      <!-- <a href="index.php?edit_comment=<?php echo $comment->id ?>">Edit</a> -->
                                    <a onclick="javascript: return confirm('Do you want to delete')" class="del" href="backend/delete_comment.php?delete_comment=<?php echo $comment->id ?>"><i class="fa fa-trash"></i></a>
                                  
                                    
                                 </td>
                                 
                               </tr>

                               <?php
                            
                             
                           
                           
                           ?>
                           
                       </tbody>
                       <!-- <h2 class="text-center"></h2> -->
                  </table>

                  <?php

                 }
                 else{

                    echo "<h2 class='text-center'>No comment</h2>";
                 }

                 



                  ?>

             </div>
            
         </div>
     </div>
   <?php
}
else{

    ?>
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">
                  Comments
                 
              </h1>

              <div class="col-md-12">
                  <table class="table table-responsive table-striped">
                       <thead>
                          <tr>
                              <th>Sn</th>
                              <th>Author </th>
                              <th>Comment</th>
                              <th>Comment Date</th>
                              <th>Action</th>
                              
                          </tr>
                           
                       </thead>
                       <tbody>

                          <?php

                       
                          $sn = 0;
                          
                     
                          $comments = Comment::find_all();
                            


                           foreach ($comments as $comment) {

                                  $sn +=1;
                              ?>
                              <tr>
                                <td><?php echo $sn ?></td>
                                <td><?php echo $comment->author ?></td>
                                <td><?php echo $comment->body ?></td>
                                <td><?php Comment::date_for_comment($comment->comment_date ); ?></td>
                                
                                <td>
                                     <!-- <a href="index.php?edit_comment=<?php echo $comment->id ?>">Edit</a> -->
                                   <a onclick="javascript: return confirm('Do you want to delete')" class="del" href="backend/delete_comment.php?delete_comment=<?php echo $comment->id ?>"><i class="fa fa-trash"></i></a>
                                 
                                   
                                </td>
                                
                              </tr>

                              <?php
                           }
                          
                            
}

?>    

    <!-- Page Heading -->
   
    <!-- /.row -->

</div>