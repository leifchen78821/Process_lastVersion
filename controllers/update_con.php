<?php
class update_con extends Controller{
    
    function update() {
        $articleGet = $this->model("update_mod");
        $sUserName = $articleGet->settingcookieuserName();
        
        if ($sUserName == "Guest") {
        	$data[0] = "errorin" ;
        }
        else {
            header("Content-Type:text/html; charset=utf-8");
            
            $articleGet->ArticleIDinsession($_GET["ArticleID"]);
            
            $articleGet->Articlegetinrow();
            
            if (isset($_POST["button_preview"])) {
                
                $articleGet->ArticlegetinPOST($_FILES["file"]["tmp_name"],$_FILES["file"]["name"],$sUserName,$_POST["S1"],$_POST["address_X"],$_POST["address_Y"],$_POST["title"],$_POST["article"]);
                
            	header("Location: ../update_preview/update_preview");
            	exit();
            }
            if (isset($_POST["button_clear"])) {
            	header("Location: ../member/member?choose=2");
            	$articleGet->sessiondestroy();
            }
        }
        $this->view("update",$data);
    }
    
}
?>