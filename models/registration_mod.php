<?php
// require_once("config/databasecalling_mod.php");

class registration_mod {
    function registration_check($sUserName) {
        
        $checknum = 0 ;
        
        // $commandText = "SELECT mID FROM MemberProfile WHERE Name = '" . $sUserName . "'";
        // $memberresult = $this->databasecalling($commandText) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $commandText = "SELECT mID FROM MemberProfile WHERE Name = :sUserName ;";
        
        $prepare = $pdolink->prepare($commandText);
        $prepare->bindParam(':sUserName',$sUserName);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        if($memberresult["mID"] != '') {
          $checknum = 1 ;
        }
        return $checknum ;
    }
    
    function registration_write($sUserName,$sUserPassword,$txtGender,$txtPhoneNumber) {
        // $insertData ="INSERT INTO MemberProfile (
        //                 Name,
        //                 Password,
        //                 Gender,
        //                 PhoneNumber)  
        //                 VALUES ( 
        //                 '{$_POST[txtUserName]}' , 
        //                 '{$_POST[txtPassword]}' , 
        //                 '{$_POST[txtGender]}' , 
        //                 '{$_POST[txtPhoneNumber]}' )";  
        // $result = $this->databasecalling($insertData) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $insertData ="INSERT INTO MemberProfile (
                        Name,
                        Password,
                        Gender,
                        PhoneNumber)  
                        VALUES ( 
                        :txtUserName , 
                        :txtPassword , 
                        :txtGender , 
                        :txtPhoneNumber )";
        
        $prepare = $pdolink->prepare($insertData);
        $prepare->bindParam(':txtUserName',$sUserName);
        $prepare->bindParam(':txtPassword',$sUserPassword);
        $prepare->bindParam(':txtGender',$txtGender);
        $prepare->bindParam(':txtPhoneNumber',$txtPhoneNumber);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
    }
}
?>