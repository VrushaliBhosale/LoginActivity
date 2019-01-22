<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <h2>welcome !!!!!</h2><br><br>
    <input type="submit" value="Logout">
</form>
</body>
</html>
<?php

include 'User.php';

session_start();
if(isset($_SESSION['name']))
{
    echo "session is there";
    echo $_SESSION['name'];
}
if($_SERVER["REQUEST_METHOD"] == "POST")  
{
    session_destroy();
    header("location: login.php");
}

?>