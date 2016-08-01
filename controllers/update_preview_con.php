<?php

class update_preview_con extends Controller{
    
    function update_preview() {
		
		$articleUpdate = $this->model("update_preview_mod");
		$data[1] = $articleUpdate->sessionAricleGet();
		
		if ($_COOKIE["userName"] == "Guest") {
			$data[0] = "errorin" ;
		}
		else {
			if (isset($_POST["button_repair"])) {
				header("Location: ../update/update");
				exit();
			}
			if (isset($_POST["button_send"])) {
			    // require("../models/update_preview_mod.php");
			    
			    // $articleUpdate = $this->model("update_preview_mod");
        		$sessionAricleGet = $articleUpdate->sessionAricleGet();
			    
				// $articleUpdate = $this->model("update_preview_mod");
        		$articleUpdate->update_preview($sessionAricleGet[0],$sessionAricleGet[1],$sessionAricleGet[2],$sessionAricleGet[3],$sessionAricleGet[4],$sessionAricleGet[5],$sessionAricleGet[6]);
				
				
				header("Location: ../member/member?choose=2");
				$articleUpdate->sessiondestroy();
				// $state = $_SESSION['state'] ;
				// session_destroy();
				// session_start();
				// $_SESSION['state'] = $state ;
				
				exit();
			}
		}
		$this->view("update_preview",$data);
	}
}
?>