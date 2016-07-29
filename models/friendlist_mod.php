<?php
// require_once("config/databasecalling_mod.php");

class friendlist_mod {

    function friendlist() {
        // $commandText = "SELECT Name FROM MemberProfile;";
        // $result = $this->databasecalling($commandText) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $commandText = "SELECT `Name` FROM `MemberProfile`;";
        
        $prepare = $pdolink->prepare($commandText);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
    return $result ;
    }
}
?>