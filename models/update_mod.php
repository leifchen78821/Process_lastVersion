<?php
require_once("databasecalling_mod.php");

class update_mod extends databasecalling_mod{

    function update($uID) {
        $Member = "select * from UploadFile where uID = '" . $uID . "' ;" ;
        $result = $this->databasecalling($Member) ;
        
        return $result ;
    }
}
?>