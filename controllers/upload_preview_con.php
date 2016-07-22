<?php

class upload_preview_con extends Controller{
    
    function upload_preview() {

		if ($_COOKIE["userName"] == "Guest") {
			echo "<script language='JavaScript'>";
			echo "alert('你不應該來這呦!!!');location.href='index.php';";
			echo "</script>";
		}
		else {
			session_start();
			$articleNumGet = $this->model("upload_preview_mod");
        	$resultArticleNumGet = $articleNumGet->upload_preview($_SESSION['Name']);
		     
			if (isset($_POST["button_repair"])) {
				header("Location: ../upload/upload");
				exit();
			}
			if (isset($_POST["button_send"])) {
			    // require("../models/upload_preview_mod_send.php");
			    $articleSend = $this->model("upload_preview_send_mod");
        		$articleSend->upload_preview_send($_SESSION['Name']);
				
				if ($_SESSION['state'] == "food") {
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
		$this->view("upload_preview");
	}
}
?>