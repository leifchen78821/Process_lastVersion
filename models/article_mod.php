<?php
require_once("databasecalling_mod.php");

class article_mod extends databasecalling_mod{

    function article($article) {
        $Member = "select * from UploadFile where uID = '" . $article . "' ;" ;
        // $result = $this->databasecalling($Member) ;
        $result = $this->databasecalling($Member) ;
        return $result ;
    }
    function message($article) {
        $Message = "select * from Message where ArticleNumber = '" . $article . "' order by Time desc ;" ;
        $result = $this->databasecalling($Message) ;
        return $result ;
    }
}

?>