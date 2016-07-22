<?php
class update_con extends Controller{
    
    function update() {
        if ($_COOKIE["userName"] == "Guest") {
        	echo "<script language='JavaScript'>";
        	echo "alert('你不應該來這呦!!!');location.href='../index/index';";
        	echo "</script>";
        }
        else {
            header("Content-Type:text/html; charset=utf-8");
            session_start();
            
            if($_GET["ArticleID"] != "") {
                $_SESSION['uID'] = $_GET["ArticleID"] ;
            }
            
            // require("../models/update_mod.php");
            $articleGet = $this->model("update_mod");
        	$resultArticleGet = $articleGet->update($_SESSION['uID']);
        	
        	$row = mysql_fetch_assoc($resultArticleGet);
        
            $_SESSION['image'] = $row["ImageSite"] ;
            
            if($_SESSION['change'] == 0) {
                $_SESSION['uID'] = $row["uID"] ;
                $_SESSION['Name'] = $row["Name"] ;
                $_SESSION['source'] = $row["MapSite"] ;
                $_SESSION['address_X'] = $row["Map_X"] ;
                $_SESSION['address_Y'] = $row["Map_Y"] ;
                $_SESSION['title'] = $row["Title"] ;
                $_SESSION['article'] = $row["Article"] ;
                
            }
            
            if (isset($_POST["button_preview"])) {
                if($_FILES["file"]["tmp_name"] != '') {
                    $_SESSION['image'] = $_FILES["file"]["name"] ;
                    $_SESSION['image_tmp'] = $_FILES["file"]["tmp_name"] ;
                    move_uploaded_file($_FILES["file"]["tmp_name"],"./views/upload/".$_FILES["file"]["name"]);
                }
                
                $_SESSION['Name'] = $_COOKIE["userName"] ;
                $_SESSION['source'] = $_POST["S1"] ;
                $_SESSION['address_X'] = $_POST["address_X"] ;
                $_SESSION['address_Y'] = $_POST["address_Y"] ;
                $_SESSION['title'] = $_POST["title"] ;
                $_SESSION['article'] = $_POST["article"] ;
                
                $_SESSION['change'] = 1 ;
            	header("Location: ../update_preview/update_preview");
            	exit();
            }
            if (isset($_POST["button_clear"])) {
            	header("Location: ../member/member?choose=2");
            	session_destroy();
            }
        }
        $this->view("update");
    }
    
}
?>