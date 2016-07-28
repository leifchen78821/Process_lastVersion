<?php
class upload_con extends Controller{
    
    function upload() {
        if ($_COOKIE["userName"] == "Guest") {
        	$data[0] = "errorin" ;
        }
        else {
            session_start();
            
            if (isset($_POST["button_preview"])) {
                
                $_SESSION['Name'] = $_COOKIE["userName"] ;
                $_SESSION['source'] = $_POST["S1"] ;
                $_SESSION['address_X'] = $_POST["address_X"] ;
                $_SESSION['address_Y'] = $_POST["address_Y"] ;
                $_SESSION['image'] = $_FILES["file"]["name"] ;
                $_SESSION['image_tmp'] = $_FILES["file"]["tmp_name"] ;
                $_SESSION['title'] = $_POST["title"] ;
                $_SESSION['article'] = $_POST["article"] ;
                
                move_uploaded_file($_FILES["file"]["tmp_name"] , "./views/upload/" . $_FILES["file"]["name"]);
            	header("Location: ../upload_preview/upload_preview");
            	exit();
            }
            if (isset($_POST["button_clear"])) {
                if($_SESSION['state'] == "food") {
            		header("Location: ../page_food/page_food");
            		session_destroy();
            		exit();
            	}
            	else {
            		header("Location: ../page_dress/page_dress");
            		session_destroy();
            		exit();
            	}
            }
        }
        $this->view("upload",$data);
    }
}
?>