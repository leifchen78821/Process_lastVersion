<?php
// require_once("config/databasecalling_mod.php");

class article_mod {

    function article($article) {
        // $Member = "SELECT * FROM UploadFile WHERE uID = :article ;" ;
        // $result = $this->databasecalling($Member) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member = "SELECT * FROM UploadFile WHERE uID = :article ;" ;
        
        $prepare = $pdolink->prepare($Member);
        $prepare->bindParam(':article',$article);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result ;
    }
    function message($article) {
        // $Message = "SELECT * FROM Message WHERE ArticleNumber = '" . $article . "' order by Time desc ;" ;
        // $result = $this->databasecalling($Message) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Message = "SELECT * FROM Message WHERE ArticleNumber = :article order by Time desc ;" ;
        
        $prepare = $pdolink->prepare($Message);
        $prepare->bindParam(':article',$article);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result ;
    }
}

?>