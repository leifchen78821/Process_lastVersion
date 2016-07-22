<?php

class update_mod{

    function update($uID) {

        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);  
        
        $Member = "select * from UploadFile where uID = '" . $uID . "' ;" ;
        $result = mysql_query($Member, $link);
        
        return $result ;
    }
}
?>