<?php
require_once("config/databasecalling_mod.php");

class friendlist_mod extends databasecalling_mod{

    function friendlist() {
        
        $commandText = "SELECT Name FROM MemberProfile;";
        $result = $this->databasecalling($commandText) ;
        
    return $result ;
    }
}
?>