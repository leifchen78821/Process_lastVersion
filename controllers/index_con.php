<?php

class index_con extends Controller{
    function index() {
        setcookie("userName" , "Guest" , time()+7200 , "/");
        // $user = $this->model("index");
        // $user->name = $name;
        $this->view("index");
    }
    
}

?>