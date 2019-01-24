<?php
include "config.php";

class User{
   public $name;
   public $email;
   public $pass;
  public $db;
  public $conn;
  
function __construct()
 {
   $this->conn=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(($this->conn)->connect_error)
   {
       echo "connection failed".$this->conn->connect_error;
   }
 }

 public function test_input()
 {
    $this->name=mysqli_real_escape_string($this->conn, $_POST['name']);
    $this->email=mysqli_real_escape_string($this->conn, $_POST['email']);
    $this->pass=mysqli_real_escape_string($this->conn, $_POST['password']);
    if( empty($this->name) || empty($this->email) || empty($this->pass) )
     {
       // echo "empty fields";
       return false;
     }else{
        // echo "inputs are ok";
         return true;
     }
    
 }

 public function select_query()
{
   $sql="Select * from signed_users where email='$this->email' and pass='$this->pass'";
   $result=mysqli_query($this->conn,$sql);
   if ($result->num_rows > 0) 
   {
      //echo "registered";
      return true;
    } 
    return false;
  }

  public function insert_query()
  {
   $sql="INSERT INTO signed_users (fname,email,pass) VALUES('$this->name', '$this->email', '$this->pass')";
   if($this->conn->query($sql))
       {
           return true;
       }
       return false;
   }
}

?>