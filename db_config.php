<?php
include "config.php";

class Connection
{
    public $sql;
    public $conn;
    function __construct()
    {
      
        $this->conn=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        //echo "connect.."."<br>";
        if(($this->conn)->connect_error)
        {
            echo "connection failed".$this->conn->connect_error;
        }
    
    }   
     public function check_user($conn, $data)//make it just select query
     {
         $email=$data->getemail();
         $pass=$data->getpass();
        
        $sql="Select * from signed_users where email='$email' and pass='$pass'";
        $result=mysqli_query($conn,$sql);
        
        if ($result->num_rows > 0) {
            return true;
              
        } else {
            return false;
        }

     }
   public function insert($data,$conn)
   {
       $name=$data->getuser_name();
       $email=$data->getemail();
       $pass=$data->getpass(); 

       $sql="INSERT INTO signed_users (fname,email,pass) VALUES('$name', '$email', '$pass')";
       
       if($conn->query($sql))
       {
            echo "New Record inserted successfully.";
           return true;
       }
       else
       {
           echo "Error:".$sql."<br>".$conn->error; 
           return false;
       }
   }
}

?>