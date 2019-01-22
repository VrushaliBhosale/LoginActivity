<?php
session_start();
if(isset($_SESSION['name']))
    {
        echo "You are already logged in <a href='welcome.php'>Go to Home</a>";
    }
else{
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
<h1>Registration Page</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    Name:  <input name="name" type="text"><br><br>
    Email: <input name="email" type="email"><br><br>
    Password:<input name="password" type="password"><br><br>
    <input type="submit" value="Register">
    <a href="login.php">Login</a>
</body>
</html>

<?php
include "db_config.php";
include "User.php";

$db=new Connection();
$conn=$db->connect();

$name=$email=$pass="";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST")  
  {
      $name=test_input($_POST['name']);
      $email=test_input($_POST['email']);
      $pass=test_input($_POST['password']);
     
      $client = new User($name,$email,$pass);
      $isInseretd=$db->insert($client,$conn);
      echo "Inside registration";
 
      if($isInserted)
      {
          header("location: welcome.php");
      }

   }
}
?>