<?php

class upload_preview_con extends Controller{
    
    function upload_preview() {

		if ($_COOKIE["userName"] == "Guest") {
			$data[0] = "errorin" ;
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
			    $articleSend = $this->model("upload_preview_send_mod");
        		$articleSend->upload_preview_send($_SESSION['Name'],$_SESSION['state'],$resultArticleNumGet,$_SESSION['title'],$_SESSION['article'],$_SESSION['image'],$_SESSION['source'],$_SESSION['address_X'],$_SESSION['address_Y']);
				
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
		$this->view("upload_preview",$data);
	}
}
?>