<?php
include "User.php";

class Login_class extends User
{
    protected $client;
    public function __construct()
    {
        $this->client=new User();
    }

    public function login()
    {
      if(($this->client->test_input())&&($this->client->select_query()))
      {
          $_SESSION['name']=$this->client->name;
          //echo $_SESSION['name'];
           header("location:welcome.php");
           return true;
      }
     return false;
    }

    public function logout()
    {
        session_destroy();
        header("location: login.php");
        return true;
    }
}
?>