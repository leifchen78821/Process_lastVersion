<?php
require_once("config/databasecalling_mod.php");

class update_mod extends databasecalling_mod{

    function update($uID) {
        $Member = "SELECT * FROM UploadFile WHERE uID = '" . $uID . "' ;" ;
        $result = $this->databasecalling($Member) ;
        
        return $result ;
    }
}
?>