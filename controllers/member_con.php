<?php 

class member_con extends Controller{
    function member() {
    	$member = $this->model("member_mod");
    	$sUserName = $member->settingcookieuserName();
    	
		if ($sUserName == "Guest") {
			$data[3] = "errorin" ;
		}
		else {
			header("Content-Type:text/html; charset=utf-8");
			$article = $this->model("article_mod");
        	$article->settingsession();
			
            $memberDataResult = $member->memberData($sUserName);
            $data[0] = $memberDataResult;
			
			$memberArticleResult = $member->memberArticle($sUserName);
            $data[1] = $memberArticleResult;
            
            $memberMessageResult = $member->memberMessage($sUserName);
            $data[2] = $memberMessageResult;
			
			if (isset($_POST["button_changePassword"]))
			{
				header("Location: ../changepassword_check/changepassword_check");
				exit();
			}
			
			if(isset($_GET["delete"])) {
			// require("../models/member_mod_deletearticle.php");
			$member = $this->model("member_deletearticle_mod");
            $memberDataResult = $member->member_deletearticle($_GET["delete"]);
			$data[3] = "delete" ;
			}
		} 
		$this->view("member",$data);
	}
}
?>