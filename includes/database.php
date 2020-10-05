<?php 

class Database{

  public $conn;

  public function __construct(){

     $this->db_connection();
  }

  public function db_connection(){

    $this->conn = new mysqli('localhost','root','','oop_gallery');

    if(!$this->conn){
        
        echo "database not connected!";
    }
     
  }


  public function myquery($sql){

     $result = $this->conn->query($sql);

     $this->confirm_all_query($result);

     return $result;

  }

  
  private function confirm_all_query($result){

      if(!$result){
         
         die("Query failed".$this->conn->error);
      }
  }


  public function escape_the_string($data){

     return $this->conn->real_escape_string($data);
  }

  public function the_last_id(){

    return $this->conn->insert_id;
  }
  

}


$database = new Database;



 ?>