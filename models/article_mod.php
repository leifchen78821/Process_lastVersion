<?php
require_once("config/databasecalling_mod.php");

class article_mod extends databasecalling_mod{

    function article($article) {
        $Member = "SELECT * FROM UploadFile WHERE uID = '" . $article . "' ;" ;
        // $result = $this->databasecalling($Member) ;
        $result = $this->databasecalling($Member) ;
        return $result ;
    }
    function message($article) {
        $Message = "SELECT * FROM Message WHERE ArticleNumber = '" . $article . "' order by Time desc ;" ;
        $result = $this->databasecalling($Message) ;
        return $result ;
    }
}

?>