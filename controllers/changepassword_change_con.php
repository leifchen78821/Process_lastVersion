<?php

class changepassword_change_con extends Controller{
    
    function changepassword_change() {

        header("Content-Type:text/html; charset=utf-8");
        // 密碼修改確認視窗
        if (isset($_POST["btnOK"])) {
            $sUserPassword = $_POST["txtPassword"];
            $sUserPasswordcheck = $_POST["txtPasswordcheck"];
            
            if (trim($sUserPassword) == ""){
                $data[0] = "passwordempty" ;
             }
            else if($sUserPasswordcheck != $sUserPassword) {
                $data[0] = "passwordDifferent" ;
            }
            else {
                // require("../models/changepassword_mod_ch.php");
                
                $changePassword = $this->model("changepassword_change_mod");
                $userName = $changePassword->settingcookieuserName();
                $changePassword->changepassword_change($userName,$sUserPassword);
                $changePassword->settingcookie();
                $data[0] = "passwordChangeSuccess" ;
            }
          
        }
        
        if (isset($_POST["btnReset"]))
        {
        	header("Location: ../member/member?choose=1");
        	exit();
        }
        $this->view("changepassword_change",$data);
    }
}
?>