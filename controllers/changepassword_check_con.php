<?php
class changepassword_check_con extends Controller{
    
    function changepassword_check() {
        
        if ($_COOKIE["userName"] == "Guest") {
        	echo "<script language='JavaScript'>";
        	echo "alert('你不應該來這呦!!!');location.href='../connect4site/connect4site';";
        	echo "</script>";
        }
        else {
            header("Content-Type:text/html; charset=utf-8");
            
            if (isset($_POST["btnOK"])) {
                $sUserName = $_POST["txtUserName"];
                $sUserPassword = $_POST["txtPassword"];
                
                if($_COOKIE["userName"] != $sUserName) {
                    echo "<script language='JavaScript'>";
                    echo "alert('您輸入的帳號不是你的呦');";
                    echo "</script>";
                }
                else {
                    // 驗證方法同登入驗證
                    $member = $this->model("login_mod");
                    $check = $member->login($sUserName,$sUserPassword);
                    
                    if($check != 1) {
                        echo "<script language='JavaScript'>";
                        echo "alert('密碼輸入有誤');";
                        echo "</script>";
                    }
                    else {
                        header("Location: ../changepassword_change/changepassword_change");
                    }
                }
            }
        }
        $this->view("changepassword_check");
    
    }
    
}
?>