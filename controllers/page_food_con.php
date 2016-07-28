<?php
class page_food_con extends Controller{
    
    function page_food() {
        // header("Content-Type:text/html; charset=utf-8");
        // require("../models/page_food_mod.php");
        
        session_start();
        $_SESSION['state'] = "food";
        
        $article = $this->model("page_food_mod");
        $result = $article->page_food();
        
        if ($_COOKIE["userName"] == "Guest") {
            $sUserName = "訪客" ;
        }
        else {
            $sUserName = $_COOKIE["userName"] ;
        }
        
        if (isset($_GET["logout"])) {
            setcookie("userName" , "Guest" , time()+7200 , "/");
            header("Location: ../page_food/page_food");
            exit();
        }
        
        if (isset($_POST["IssuedArticle"])) {
            if ($_COOKIE["userName"] == "Guest") {
                echo "<script language='JavaScript'>";
                echo "alert('您尚未登入無法發文呦')";
                echo "</script>";
            }
            else {
                header("Location: ../upload/upload");
                exit();
            }
        }
        
        $friendlistget = $this->model("friendlist_mod");
        $friendlist = $friendlistget->friendlist();
        
        $data[0] = $sUserName;
        $data[1] = $result ;
        $data[2] = $friendlist;
        $this->view("page_food",$data);
    }
}

?>