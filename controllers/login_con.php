<?php

class login_con extends Controller{
    
    function login() {
        header("Content-Type:text/html; charset=utf-8");
  
        if (isset($_POST["btnOK"])) {
            $sUserName = $_POST["txtUserName"];
            $sUserPassword = $_POST["txtPassword"];
        
            // require("../models/login_mod.php");
            $member = $this->model("login_mod");
            $check = $member->login($sUserName,$sUserPassword);
            
            if($check != 1) {
                $data[0] = "errorin" ;
            }
            else {
                header("Location: ../connect4site/connect4site");
            }
        }
            
        if (isset($_POST["btnRegis"])) {
        	header("Location: ../registration/registration");
        	exit();
        }

        $this->view("login",$data);
    }
    
}

?>