<?php
// require_once("config/databasecalling_mod.php");

class page_dress_mod {

    function page_dress() {
        // $Member = "SELECT * FROM UploadFile WHERE State = 'dress' ORDER BY Time desc ;" ;
        // $result = $this->databasecalling($Member) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member = "SELECT * FROM `UploadFile` WHERE `State` = 'dress' ORDER BY `Time` desc ;" ;
        
        $prepare = $pdolink->prepare($Member);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result ;
    }
    
    function settingsession() {
        session_start();
        $_SESSION['state'] = "dress";
    }
    
    function settingmember() {
        
        if ($_COOKIE["userName"] == "Guest") {
            $sUserName = "Guest";
        }
        else {
            $sUserName = $_COOKIE["userName"] ;
        }
        return $sUserName ;
    }
    
}

?>