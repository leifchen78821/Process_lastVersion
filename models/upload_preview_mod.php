<?php
// require_once("config/databasecalling_mod.php");

class upload_preview_mod {

    function upload_preview($Name) {
        session_start();
        
        $NameArticleNumber = 1 ;
        // $Member = "SELECT * FROM UploadFile WHERE Name = '" . $Name . "' ;" ;
        // $result = $this->databasecalling($Member) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member = "SELECT * FROM `UploadFile` WHERE `Name` = :Name ;" ;
        
        $prepare = $pdolink->prepare($Member);
        $prepare->bindParam(':Name',$Name);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        foreach ($result as $rows) {
            $NameArticleNumber++;
        }
        return $NameArticleNumber ;
    }
}
?>