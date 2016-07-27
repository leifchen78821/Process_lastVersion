<?php
require_once("databasecalling_mod.php");

class member_mod extends databasecalling_mod{

    function memberData($name) {
        $Member01 = "select * from MemberProfile where Name = '" . $name . "' ;" ;
        $result01 = $this->databasecalling($Member01) ;
        
        return $result01 ;
    }
    
    function memberArticle($name) {
        $Member02 = "select * from UploadFile where Name = '" . $name . "' order by Time desc ;" ;
        $result02 = $this->databasecalling($Member02) ;
        
        return $result02 ;
    }
    
    function memberMessage($name) {    
        $Member03 = "select * from Message where Name = '" . $_COOKIE["userName"] . "' order by Time desc ;" ;
        $result03 = $this->databasecalling($Member03) ;
        $i = 0 ;
        while($row03 = mysql_fetch_assoc($result03)) {
            $message03[$i][0] = $row03["Time"] ;
            $message03[$i][1] = $row03["ArticleNumber"] ;
            $message03[$i][2] = $row03["MessageSent"] ;
            
            $Member03_2 = "select * from UploadFile where uID = '" . $message03[$i][1] . "' ;" ;
        	$result03_2 = $this->databasecalling($Member03_2) ;
        	$row03_2 = mysql_fetch_assoc($result03_2) ;
        	$message03[$i][3] = $row03_2["Title"];
        	$message03[$i][4] = $row03_2["State"];
            $i++;
        }
        
        return $message03 ;
        
    }   
    
}

?>