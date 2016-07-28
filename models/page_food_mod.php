<?php
require_once("config/databasecalling_mod.php");

class page_food_mod extends databasecalling_mod{

    function page_food() {
        $Member = "SELECT * FROM UploadFile WHERE State = 'food' ORDER BY Time desc ;" ;
        $result = $this->databasecalling($Member) ;
        return $result ;
    }
    
}

?>