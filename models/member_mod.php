<?php

class member_mod{

    function memberData($name) {

        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
        $Member01 = "select * from MemberProfile where Name = '" . $name . "' ;" ;
        $result01 = mysql_query($Member01, $link);
        // $row01 = mysql_fetch_assoc($result01);
        
        return $result01 ;
    }
    
    function memberArticle($name) {
        
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
        $Member02 = "select * from UploadFile where Name = '" . $name . "' order by Time desc ;" ;
        $result02 = mysql_query($Member02, $link);
        
        return $result02 ;
    }
    
    function memberMessage($name) {    
        
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);
        
        $Member03 = "select * from Message where Name = '" . $_COOKIE["userName"] . "' order by Time desc ;" ;
        $result03 = mysql_query($Member03, $link);
        $i = 0 ;
        while($row03 = mysql_fetch_assoc($result03)) {
            $message03[$i][0] = $row03["Time"] ;
            $message03[$i][1] = $row03["ArticleNumber"] ;
            $message03[$i][2] = $row03["MessageSent"] ;
            
            $Member03_2 = "select * from UploadFile where uID = '" . $message03[$i][1] . "' ;" ;
        	$result03_2 = mysql_query($Member03_2, $link) ;
        	$row03_2 = mysql_fetch_assoc($result03_2) ;
        	$message03[$i][3] = $row03_2["Title"];
        	$message03[$i][4] = $row03_2["State"];
            $i++;
        }
        
        return $message03 ;
        
    }   
    
}

?>