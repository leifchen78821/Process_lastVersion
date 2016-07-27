<?php
require_once("databasecalling_mod.php");

class registration_mod extends databasecalling_mod{
    function registration_check($sUserName) {
        
        $checknum = 0 ;
        
        $commandText = "select mID from MemberProfile where Name = '" . $sUserName . "'";
        $memberresult = $this->databasecalling($commandText) ;
        
        if($memberresult["mID"] != '') {
          $checknum = 1 ;
        }
        return $checknum ;
    }
    
    function registration_write($sUserName,$sUserPassword) {
        $insertData ="INSERT INTO MemberProfile (
                        Name,
                        Password,
                        Gender,
                        PhoneNumber)  
                        VALUES ( 
                        '{$_POST[txtUserName]}' , 
                        '{$_POST[txtPassword]}' , 
                        '{$_POST[txtGender]}' , 
                        '{$_POST[txtPhoneNumber]}' )";  
        $result = $this->databasecalling($insertData) ;
    }
}
?>