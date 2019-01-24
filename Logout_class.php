<?php

class Logout_class
{
    public function logout()
    {
        if(isset($_SESSION['name']))
        {
            session_unset();
            session_destroy();
            header("location:login.php");
        }
        
    }
}
?>