<?php

class article_con extends Controller{
    
    function article() {
        session_start();
        
        $article = $this->model("article_mod");
        $resultArticle = $article->article($_GET["ArticleID"]);
        // $rowArticle = mysql_fetch_assoc($resultArticle);

        $resultMessage = $article->message($_GET["ArticleID"]);
        // $rowMessage = mysql_fetch_assoc($resultMessage);
        
        if ($_COOKIE["userName"] == "Guest") {
            $sUserName = "訪客";
        }
        else {
            $sUserName = $_COOKIE["userName"] ;
        }
        
        if (isset($_GET["logout"])) {
            setcookie("userName" , "Guest" , time()+7200 , "/");
            header("Location: ../article/article?ArticleID=" . $_GET["ArticleID"]);
            exit();
        }
        
        if (isset($_POST["send_message"])) {
            if ($_COOKIE["userName"] == "Guest") {
                $data[3] = "notmember" ;
            }
            else {
                // require("../models/article_mod_insertmessage.php");
                $insertmessage = $this->model("article_insertmessage_mod");
                $insertmessage->article_insertmessage($_GET["ArticleID"],$sUserName,$_POST["message_send_in"]);
                header("Location: ../article/article?ArticleID=" . $_GET["ArticleID"]);
                exit();
            }
        }
        $data[0] = $sUserName;
        $data[1] = $resultArticle ;
        $data[2] = $resultMessage ;
        $this->view("article",$data);
    }
    
}
?>