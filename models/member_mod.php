<?php
// require_once("config/databasecalling_mod.php");

class member_mod {

    function memberData($name) {
        // $Member01 = "SELECT * FROM MemberProfile WHERE Name = '" . $name . "' ;" ;
        // $result01 = $this->databasecalling($Member01) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member01 = "SELECT * FROM MemberProfile WHERE Name = :name ;" ;
        
        $prepare = $pdolink->prepare($Member01);
        $prepare->bindParam(':name',$name);
        $prepare->execute();
        $result01 = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result01[0] ;
    }
    
    function memberArticle($name) {
        // $Member02 = "SELECT * FROM UploadFile WHERE Name = '" . $name . "' order by Time desc ;" ;
        // $result02 = $this->databasecalling($Member02) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member02 = "SELECT * FROM UploadFile WHERE Name = :name order by Time desc ;" ;
        
        $prepare = $pdolink->prepare($Member02);
        $prepare->bindParam(':name',$name);
        $prepare->execute();
        $result02 = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result02 ;
    }
    
    function memberMessage($name) {    
        // $Member03 = "SELECT * FROM Message WHERE Name = '" . $_COOKIE["userName"] . "' order by Time desc ;" ;
        // $result03 = $this->databasecalling($Member03) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member03 = "SELECT * FROM Message WHERE Name = :name order by Time desc ;" ;
        
        $prepare = $pdolink->prepare($Member03);
        $prepare->bindParam(':name',$_COOKIE["userName"]);
        $prepare->execute();
        $result03 = $prepare->fetchAll(PDO::FETCH_ASSOC);
        
        $i = 0 ;
        foreach ($result03 as $row03) {
            $message03[$i][0] = $row03["Time"] ;
            $message03[$i][1] = $row03["ArticleNumber"] ;
            $message03[$i][2] = $row03["MessageSent"] ;
            
            //  $Member03_2 = "SELECT * FROM UploadFile WHERE uID = '" . $message03[$i][1] . "' ;" ;
            // 	$result03_2 = $this->databasecalling($Member03_2) ;
        	
        	$Member03_2 = "SELECT * FROM UploadFile WHERE uID = :message ;" ;
        
            $prepare = $pdolink->prepare($Member03_2);
            $prepare->bindParam(':message',$message03[$i][1]);
            $prepare->execute();
            $result03_2 = $prepare->fetchAll(PDO::FETCH_ASSOC);
        	
        	$message03[$i][3] = $result03_2[0]["Title"];
        	$message03[$i][4] = $result03_2[0]["State"];
            $i++;
        }
        
        $pdo->closeConnection();
        return $message03 ;
        
    }   
    
}

?>