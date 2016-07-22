<?php
class registration_mod{
    function registration_check($sUserName) {
        
        $checknum = 0 ;
        
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);  
        
        $commandText = "select mID from MemberProfile where Name = '" . $sUserName . "'";
        $memberresult = mysql_query($commandText, $link);
        $row = mysql_fetch_assoc($memberresult);
        
        if($row["mID"] != '') {
          $checknum = 1 ;
        }
        return $checknum ;
    }
    
    function registration_write($sUserName,$sUserPassword) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
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
        $result = mysql_query($insertData, $link);
    }
}
?>