$(document).ready(function(){

var user_id;
var user_href;
var user_href_splitted;	

var image_name;
var image_src;
var image_href_splitted;

var photo_id;	

$(".modal_thumbnails").click(function(){

	$("#set_user_image").prop('disabled',false);

	user_href = $("#user-id").prop('href');

    user_href_splitted = user_href.split("=");

    user_id = user_href_splitted[user_href_splitted.length-1];

    image_src = $(this).prop("src");

    image_href_splitted = image_src.split("/");

    image_name =   image_href_splitted[image_href_splitted.length-1];

   
    photo_id = $(this).attr("data");


    $.ajax({

        url:"../includes/ajax_code.php",
        method: "POST",
        data : {photo_id:photo_id},
        success:function(data){

          if(!data.error){
             
              $('#modal_sidebar').html(data);
          }
           
           
        } 

    });


});


$("#set_user_image").click(function(){

 $.ajax({

   url:"../includes/ajax_code.php",
   data : {image_name:image_name,user_id:user_id},
   type: "POST",
   success:function(data){

   	   if(!data.error){
           
           // location.reload(true);

           // alert(data);

           $('.user_image_box a img').prop('src','../images/'+ image_name);
   	   }
   }

 });



});


/******photo sidebar functionality with javascript and jquery********/

$(".info-box-header").click(function(){

    $(".inside").slideToggle("fast");

    $("#toggle").toggleClass("glyphicon-menu-down glyphicon, glyphicon-menu-up glyphicon");
});





tinymce.init({selector:'textarea'})

});

