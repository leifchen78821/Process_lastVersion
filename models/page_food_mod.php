<?php
// require_once("config/databasecalling_mod.php");

class page_food_mod {

    function page_food() {
        // $Member = "SELECT * FROM UploadFile WHERE State = 'food' ORDER BY Time desc ;" ;
        // $result = $this->databasecalling($Member) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member = "SELECT * FROM `UploadFile` WHERE `State` = 'food' ORDER BY `Time` desc ;" ;
        
        $prepare = $pdolink->prepare($Member);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result ;
    }
    
    function settingsession() {
        session_start();
        $_SESSION['state'] = "food";
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