<?php
class page_dress_con extends Controller{
    
    function page_dress() {
        // header("Content-Type:text/html; charset=utf-8");
        // require("../models/page_food_mod.php");
        
        session_start();
        $_SESSION['state'] = "dress";
        
        $article = $this->model("page_dress_mod");
        $result = $article->page_dress();
        
        if ($_COOKIE["userName"] == "Guest") {
            $sUserName = "訪客" ;
        }
        else {
            $sUserName = $_COOKIE["userName"] ;
        }
        
        if (isset($_GET["logout"])) {
            setcookie("userName" , "Guest" , time()+7200 , "/");
            header("Location: ../page_dress/page_dress");
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
        $data[0] = $sUserName;
        $data[1] = $result ;
        $this->view("page_dress",$data);
    }
}

?>