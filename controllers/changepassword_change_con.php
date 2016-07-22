<?php

class changepassword_change_con extends Controller{
    
    function changepassword_change() {

        header("Content-Type:text/html; charset=utf-8");
        // 密碼修改確認視窗
        if (isset($_POST["btnOK"])) {
            $sUserPassword = $_POST["txtPassword"];
            $sUserPasswordcheck = $_POST["txtPasswordcheck"];
            
            if (trim($sUserPassword) == ""){
                echo "<script language='JavaScript'>";
              	echo "alert('密碼不可空白')";
                echo "</script>";
             }
            else if($sUserPasswordcheck != $sUserPassword) {
                echo "<script language='JavaScript'>";
            	echo "alert('密碼確認與設定密碼不一致')";
                echo "</script>";
            }
            else {
                // require("../models/changepassword_mod_ch.php");
                $changePassword = $this->model("changepassword_change_mod");
                $changePassword->changepassword_change($_COOKIE["userName"],$sUserPassword);
                setcookie("userName" , "Guest" , time()+7200 , "/");
                echo "<script language='JavaScript'>";
          	    echo "alert('密碼修改成功,請重新登入');location.href='../login/login';";
                echo "</script>";
            }
          
        }
        
        if (isset($_POST["btnReset"]))
        {
        	header("Location: ../member/member?choose=1");
        	exit();
        }
        $this->view("changepassword_change");
    }
}
?>