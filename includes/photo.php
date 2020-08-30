<?php

// include "db_object.php"; 

class Photo extends Db_object{

    protected static $db_table = "photos";
    public $photo_id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $size;
	public $tmp_path;
    public $custom_error = [];
    public $upload_error = [

      UPLOAD_ERR_OK => "There is no error",
      UPLOAD_ERR_NO_FILE => "No file was uploaded",

    ];

    // this is passing $_FILES['uploaded_file'] as an argument// 

     
        
       


}

?>