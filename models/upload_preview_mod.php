<?php
require_once("databasecalling_mod.php");

class upload_preview_mod extends databasecalling_mod{

    function upload_preview($Name) {
        session_start();
        
        $NameArticleNumber = 1 ;
        $Member = "select * from UploadFile where Name = '" . $Name . "' ;" ;
        $result = $this->databasecalling($Member) ;
        foreach ($result as $rows) {
            $NameArticleNumber++;
        }
        return $NameArticleNumber ;
    }
}
?>