<?php
require_once("config/databasecalling_mod.php");

class login_mod extends databasecalling_mod{

    function login($sUserName,$sUserPassword) {
        
        $check = 0 ; //避免重複查詢資料庫回報alert，設此參數讓資料庫查詢完畢後再alert一次
        
        $commandText = "SELECT mID FROM MemberProfile WHERE Name = '" . $sUserName . "' AND Password = '" . $sUserPassword . "';";
        $result = $this->databasecalling($commandText) ;
        
        if($result[0]["mID"] != '') {
            setcookie("userName" , "$sUserName" , time()+7200 , "/");
            $check = 1 ;
        }
    return $check ;
    }
}
?>