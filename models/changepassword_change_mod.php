<?php
class changepassword_change_mod{

    function changepassword_change($name,$sUserPassword) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);
        
        $updatePassword = "UPDATE MemberProfile SET 
                                   Password = '{$sUserPassword}'
        					       WHERE Name = '{$name}' ";  
        $result = mysql_query($updatePassword, $link);
    }
}
?>