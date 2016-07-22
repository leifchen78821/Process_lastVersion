<?php
class login_mod{

    function login($sUserName,$sUserPassword) {
        
        $check = 0 ; //避免重複查詢資料庫回報alert，設此參數讓資料庫查詢完畢後再alert一次
        
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);
        
        $commandText = "select mID from MemberProfile where Name = '" . $sUserName . "' AND Password = '" . $sUserPassword . "';";
        $result = mysql_query($commandText, $link);
        $row = mysql_fetch_assoc($result);
        
        if($row["mID"] != '') {
            setcookie("userName" , "$sUserName" , time()+7200 , "/");
            $check = 1 ;
        }
    return $check ;
    }
}
?>