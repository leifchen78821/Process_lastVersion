<?php

class update_preview_con extends Controller{
    
    function update_preview() {

		if ($_COOKIE["userName"] == "Guest") {
			$data[0] = "errorin" ;
		}
		else {
			session_start();
			 
			if (isset($_POST["button_repair"])) {
				header("Location: ../update/update");
				exit();
			}
			if (isset($_POST["button_send"])) {
			    // require("../models/update_preview_mod.php");
				$articleUpdate = $this->model("update_preview_mod");
        		$articleUpdate->update_preview($_SESSION['uID'],$_SESSION['source'],$_SESSION['address_X'],$_SESSION['address_Y'],$_SESSION['image'],$_SESSION['title'],$_SESSION['article']);
				
				
				header("Location: ../member/member?choose=2");
				$state = $_SESSION['state'] ;
				session_destroy();
				session_start();
				$_SESSION['state'] = $state ;
				
				exit();
			}
		}
		$this->view("update_preview",$data);
	}
}
?>