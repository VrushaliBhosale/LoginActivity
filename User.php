<?php

class User{
  public $user_name;
  public $email;
  public $pass;
  
function __construct($name,$email,$pass)
 {
    $this->user_name = $name;
    $this->email = $email;
    $this->pass = $pass;
 }

  function setuser_name($user_name){
    $this->user_name = $user_name;
 }
 
 function getuser_name(){

    return $this->user_name;
 }

 function setemail($email){
    $this->email = $email;
 }
 
 function getemail(){
   return $this->email;
 }

 function setpass($pass){
    $this->pass = $pass;
 }
 
 function getpass(){
    return $this->pass;
 }

 function call_welcome(){
   header("location: welcome.php");
   exit;
   }
}

class Unsigned_User extends User
{
   function __construct()
 {
   
 }
   function call_welcome()
   {
      echo "Register First.";
      header("location: login.php");
   }
}
?>