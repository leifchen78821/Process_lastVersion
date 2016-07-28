<?php
// require_once("config/databasecalling_mod.php");

class login_mod {

    function login($sUserName,$sUserPassword) {
        
        $check = 0 ; //避免重複查詢資料庫回報alert，設此參數讓資料庫查詢完畢後再alert一次
        
        // $commandText = "SELECT mID FROM MemberProfile WHERE Name = '" . $sUserName . "' AND Password = '" . $sUserPassword . "';";
        // $result = $this->databasecalling($commandText) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
       $commandText = "SELECT mID FROM MemberProfile WHERE Name = :sUserName AND Password = :sUserPassword ;";
        
        $prepare = $pdolink->prepare($commandText);
        $prepare->bindParam(':sUserName',$sUserName);
        $prepare->bindParam(':sUserPassword',$sUserPassword);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        if($result[0]["mID"] != '') {
            setcookie("userName" , "$sUserName" , time()+7200 , "/");
            $check = 1 ;
        }
    return $check ;
    }
}
?>