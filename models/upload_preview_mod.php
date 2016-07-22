<?php
class upload_preview_mod{

    function upload_preview($Name) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);  
        
        session_start();
        
        $NameArticleNumber = 1 ;
        $Member = "select * from UploadFile where Name = '" . $Name . "' ;" ;
        $result = mysql_query($Member, $link);
        while ($row = mysql_fetch_assoc($result)) {
            $NameArticleNumber++;
        }
        return $NameArticleNumber ;
    }
}
?>