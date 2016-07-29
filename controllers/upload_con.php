<?php
class upload_con extends Controller{
    
    function upload() {
        $articleGet = $this->model("upload_mod");
        $sUserName = $articleGet->settingcookieuserName();
        
        if ($sUserName == "Guest") {
        	$data[0] = "errorin" ;
        }
        else {
            session_start();
            
            if (isset($_POST["button_preview"])) {
                
                $articleGet->ArticlegetinPOST($_FILES["file"]["tmp_name"],$_FILES["file"]["name"],$sUserName,$_POST["S1"],$_POST["address_X"],$_POST["address_Y"],$_POST["title"],$_POST["article"]);
                
            	header("Location: ../upload_preview/upload_preview");
            	exit();
            }
            if (isset($_POST["button_clear"])) {
                $articleGet->stategoing();
            }
        }
        $this->view("upload",$data);
    }
}
?>