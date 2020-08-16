<?php 

class Database{

	public $conn;
	

	function __construct(){

		$this->open_db_connection();
	}

	public function open_db_connection(){

		// $this->conn = mysqli_connect('localhost','root','','oop_gallery');

		$this->conn = new mysqli('localhost','root','','oop_gallery');


		if($this->conn->error){
           
            die('Database not connected!'.$this->conn->error);
		}
        
	}

	public function myquery($sql){

        $result = $this->conn->query($sql);
        
        $this->confirm_the_query($result);
        
        return $result;
	}


	private function confirm_the_query($result){

       if(!$result){
          
          die('Query failed'.$this->conn->error);
       }

	}

	public function escape_the_string($string){

       return $this->conn->real_esacpe_string($string);
	}


	public function the_insert_id(){

		return $conn->insert_id;
	}

}

$database = new Database;



 ?>