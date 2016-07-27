<?php 

class member_con extends Controller{
    
    function member() {
		if ($_COOKIE["userName"] == "Guest") {
			echo "<script language='JavaScript'>";
			echo "alert('你不應該來這呦!!!');location.href='index.php';";
			echo "</script>";
		}
		else {
			header("Content-Type:text/html; charset=utf-8");
			session_start();
			$_SESSION['change'] = 0 ; //確認修改文章是否進入過
			$member = $this->model("member_mod");
			
            $memberDataResult = $member->memberData($_COOKIE["userName"]);
            $data[0] = $memberDataResult;
			
			$memberArticleResult = $member->memberArticle($_COOKIE["userName"]);
            $data[1] = $memberArticleResult;
            
            $memberMessageResult = $member->memberMessage($_COOKIE["userName"]);
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
			echo "<script language='JavaScript'>";
			echo "alert('刪除成功!!!');location.href='../member/member?choose=2';";
			echo "</script>";
			}
		} 
		$this->view("member",$data);
	}
}
?>