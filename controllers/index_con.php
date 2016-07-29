<?php

class index_con extends Controller{
    function index() {
        $index = $this->model("index_mod");
        $index->settingcookie();
        // $user = $this->model("index");
        // $user->name = $name;
        $this->view("index");
    }
    
}

?>