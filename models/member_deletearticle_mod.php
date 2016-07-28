<?php
require_once("config/databasecalling_mod.php");

class member_deletearticle_mod extends databasecalling_mod{

    function member_deletearticle($delete) {
        $deletedata = "DELETE FROM UploadFile WHERE uID = " . $delete . " ; " ;
        $result = $this->databasecalling($deletedata) ;
    }
    
}

?>