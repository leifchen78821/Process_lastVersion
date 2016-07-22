<?php

class article_mod{

    function article($article) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
        $Member = "select * from UploadFile where uID = '" . $article . "' ;" ;
        $result = mysql_query($Member, $link);
        
        return $result ;
    }
    function message($article) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
        $Message = "select * from Message where ArticleNumber = '" . $article . "' order by Time desc ;" ;
        $result = mysql_query($Message, $link);
        return $result ;
    }
}

?>