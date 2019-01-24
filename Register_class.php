<?php
include "User.php";

class Register_class extends User
{
    protected $client;
    public function __construct()
    {
        $this->client=new User();
    }

    public function register()
    {
        $this->client->test_input();
        if(!($this->client)->select_query())
        {
            if(($this->client)->insert_query())
            {
                return true;
            }
           return false;
        }
        return false;
    }
}
?>