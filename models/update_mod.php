<?php
// require_once("config/databasecalling_mod.php");

class update_mod {

    function update($uID) {
        // $Member = "SELECT * FROM UploadFile WHERE uID = '" . $uID . "' ;" ;
        // $result = $this->databasecalling($Member) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member = "SELECT * FROM UploadFile WHERE uID = :uID ;" ;
        
        $prepare = $pdolink->prepare($Member);
        $prepare->bindParam(':uID',$uID);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result ;
    }
}
?>