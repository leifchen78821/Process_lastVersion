<?php
class page_dress_con extends Controller{
    
    function page_dress() {
        // header("Content-Type:text/html; charset=utf-8");
        // require("../models/page_food_mod.php");
        
        $article = $this->model("page_dress_mod");
        $result = $article->page_dress();
        $article->settingsession();
        
        $sUserName = $article->settingmember();
        if ($sUserName == "Guest") {
            $sUserName = "訪客";
        }
        
        if (isset($_GET["logout"])) {
            setcookie("userName" , "Guest" , time()+7200 , "/");
            header("Location: ../page_dress/page_dress");
            exit();
        }
        
        if (isset($_POST["IssuedArticle"])) {
            if ($sUserName == "Guest") {
                $data[2] = "notmember" ;
            }
            else {
                header("Location: ../upload/upload");
                exit();
            }
        }
        $data[0] = $sUserName;
        $data[1] = $result ;
        $this->view("page_dress",$data);
    }
}

?>