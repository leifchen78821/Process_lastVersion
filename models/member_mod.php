<?php
require_once("config/databasecalling_mod.php");

class member_mod extends databasecalling_mod{

    function memberData($name) {
        $Member01 = "SELECT * FROM MemberProfile WHERE Name = '" . $name . "' ;" ;
        $result01 = $this->databasecalling($Member01) ;
        
        return $result01[0] ;
    }
    
    function memberArticle($name) {
        $Member02 = "SELECT * FROM UploadFile WHERE Name = '" . $name . "' order by Time desc ;" ;
        $result02 = $this->databasecalling($Member02) ;
        
        return $result02 ;
    }
    
    function memberMessage($name) {    
        $Member03 = "SELECT * FROM Message WHERE Name = '" . $_COOKIE["userName"] . "' order by Time desc ;" ;
        $result03 = $this->databasecalling($Member03) ;
        $i = 0 ;
        // while($row03 = mysql_fetch_assoc($result03)) {
        foreach ($result03 as $row03) {
            $message03[$i][0] = $row03["Time"] ;
            $message03[$i][1] = $row03["ArticleNumber"] ;
            $message03[$i][2] = $row03["MessageSent"] ;
            
            $Member03_2 = "SELECT * FROM UploadFile WHERE uID = '" . $message03[$i][1] . "' ;" ;
        	$result03_2 = $this->databasecalling($Member03_2) ;
        // 	$row03_2 = mysql_fetch_assoc($result03_2) ;
        	$message03[$i][3] = $result03_2[0]["Title"];
        	$message03[$i][4] = $result03_2[0]["State"];
            $i++;
        }
        
        return $message03 ;
        
    }   
    
}

?>