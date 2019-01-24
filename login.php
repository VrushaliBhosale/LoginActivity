<?php
session_start();
if(!isset($_SESSION['name']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>LOGIN Page</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Name:  <input name="name" type="text" required><br><br>
    Email: <input name="email" type="email" required><br><br>
    Password:<input name="password" type="password" required><br><br>

    <input type="submit" value="Login">
    <a href="registration.php?">Register</a>
    </form>
</body>
</html>

<?php

include "Login_class.php";

if($_SERVER["REQUEST_METHOD"] == "POST")  
 {
    $obj=new Login_class();
    if(!$obj->login())
    {
        echo "Register FIrst";
    }
  
 }
}
else{
    echo "You are already logged in <a href='welcome.php'>Go to HOme</a>";
}
?>



