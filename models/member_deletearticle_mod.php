<?php
// require_once("config/databasecalling_mod.php");

class member_deletearticle_mod {

    function member_deletearticle($delete) {
        // $deletedata = "DELETE FROM UploadFile WHERE uID = " . $delete . " ; " ;
        // $result = $this->databasecalling($deletedata) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $deletedata = "DELETE FROM `UploadFile` WHERE `uID` = :delete ; " ;
        
        $prepare = $pdolink->prepare($deletedata);
        $prepare->bindParam(':delete',$delete);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        
        $deletemessage = "DELETE FROM `Message` WHERE `ArticleNumber` = :delete ; " ;
        
        $prepare = $pdolink->prepare($deletemessage);
        $prepare->bindParam(':delete',$delete);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        
        $pdo->closeConnection();
    }
    
}

?>