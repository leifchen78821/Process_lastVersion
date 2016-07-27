<?php
require_once("databasecalling_mod.php");

class changepassword_change_mod extends databasecalling_mod{

    function changepassword_change($name,$sUserPassword) {
        $updatePassword = "UPDATE MemberProfile SET 
                                   Password = '{$sUserPassword}'
        					       WHERE Name = '{$name}' ";  
        $result = $this->databasecalling($updatePassword) ;
    }
}
?>