<?php
require_once("databasecalling_mod.php");

class page_dress_mod extends databasecalling_mod{

    function page_dress() {
        $Member = "select * from UploadFile where State = 'dress' order by Time desc ;" ;
        $result = $this->databasecalling($Member) ;
        return $result ;
    }
    
}

?>