$(document).ready(function(){

var photo_href;
var photo_id_splitted;
var photo_id;

var image_photo;
var image_for_splitted;
var image_for_photo;

$(".modal_thumbnails").click(function(){

	$("#set_photo_image").prop("disabled",false);
    
    photo_href = $("#photo-id").prop("href");

    photo_id_splitted = photo_href.split("=");

    photo_id =  photo_id_splitted[ photo_id_splitted.length-1];

    image_photo = $(this).prop("src");

    image_for_splitted = image_photo.split("/");

    image_for_photo = image_for_splitted[image_for_splitted.length-1];

     

});


$("#set_photo_image").click(function(){

	 $.ajax({

        url : "../includes/ajax_code.php",
        method : "POST",
        data : {photo_id:photo_id, image_for_photo:image_for_photo},
        success:function(data){
          
            if(!data.error){
               
                 $("#image_box a img").prop("src",'../images/'+ image_for_photo);
            }
        }

	 });
});


$(".info-box-header").click(function(){

	$(".inside").slideToggle("fast");

	$("#toggle").toggleClass('glyphicon-menu-down , glyphicon-menu-up');
});


tinymce.init({selector:'textarea'})


});