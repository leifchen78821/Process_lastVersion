<?php
require_once("databasecalling_mod.php");

class page_food_mod extends databasecalling_mod{

    function page_food() {
        $Member = "select * from UploadFile where State = 'food' order by Time desc ;" ;
        $result = $this->databasecalling($Member) ;
        return $result ;
    }
    
}

?>