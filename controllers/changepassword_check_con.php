<?php
class changepassword_check_con extends Controller{
    
    function changepassword_check() {
        
        if ($_COOKIE["userName"] == "Guest") {
        	$data[0] = "errorin" ;
        }
        else {
            header("Content-Type:text/html; charset=utf-8");
            
            if (isset($_POST["btnOK"])) {
                $sUserName = $_POST["txtUserName"];
                $sUserPassword = $_POST["txtPassword"];
                
                if($_COOKIE["userName"] != $sUserName) {
                    $data[0] = "notYou" ;
                }
                else {
                    // 驗證方法同登入驗證
                    $member = $this->model("login_mod");
                    $check = $member->login($sUserName,$sUserPassword);
                    
                    if($check != 1) {
                        $data[0] = "wrongPassword" ;
                    }
                    else {
                        header("Location: ../changepassword_change/changepassword_change");
                    }
                }
            }
        }
        $this->view("changepassword_check",$data);
    
    }
    
}
?>