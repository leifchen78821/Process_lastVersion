<?php
require_once("config/databasecalling_mod.php");

class page_dress_mod extends databasecalling_mod{

    function page_dress() {
        $Member = "SELECT * FROM UploadFile WHERE State = 'dress' ORDER BY Time desc ;" ;
        $result = $this->databasecalling($Member) ;
        return $result ;
    }
    
}

?>