<?php

class registration_con extends Controller{
    function registration() {
    
    if (isset($_POST["btnSend"])) {
      $sUserName = $_POST["txtUserName"];
      $sUserPassword = $_POST["txtPassword"];
      $sUserPasswordcheck = $_POST["txtPasswordcheck"];
      
      if (trim($sUserName) == "") {
        echo "<script language='JavaScript'>";
        echo "alert('帳號不可空白')";
        echo "</script>";
      }
      else if (trim($sUserPassword) == "") {
        echo "<script language='JavaScript'>";
        echo "alert('密碼不可空白')";
        echo "</script>";
      }
      else {
        if($sUserPasswordcheck != $sUserPassword) {
          echo "<script language='JavaScript'>";
          echo "alert('密碼確認與設定密碼不一致')";
          echo "</script>";
        }
        else {
          
          $member = $this->model("registration_mod");
          $checknum = $member->registration_check($sUserName);
          
          if($checknum == 1) {
            echo "<script language='JavaScript'>";
            echo "alert('此帳號已被使用')";
            echo "</script>";
          }
          else {
            $member->registration_write($sUserName,$sUserPassword);
            echo "<script language='JavaScript'>";
            echo "alert('加入會員成功! 系統將自動跳轉至登入頁');location.href='../login/login';";
            echo "</script>";
          }
        }
      }
    }
  $this->view("registration");
  }
    
}
?>