<?php



class Comment extends Db_object{
	
    protected static $db_table = "comments";
    protected static $db_id = "id";
    public $id;
	public $photo_id;
	public $user_id;
	public $author;
	public $body;
    public $comment_date;

	// public static function create_comment($photo_id,$author,$body){

 //         if(!empty($photo_id) && !empty($author) && !empty($body)){
             
 //             $comment = new Comment();
 //             $comment->photo_id = $photo_id;
 //             $comment->author   = $author;
 //             $comment->body = $body;
 //         }
	// }

	

}

 ?>