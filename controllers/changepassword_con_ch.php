<?php

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
        require("../models/changepassword_mod_ch.php");
        setcookie("userName", "Guest");
        echo "<script language='JavaScript'>";
  	    echo "alert('密碼修改成功,請重新登入');location.href='login.php';";
        echo "</script>";
    }
  
}

if (isset($_POST["btnReset"]))
{
	header("Location: member.php?choose=1");
	exit();
}

?>