<?php

class registration_con extends Controller{
    function registration() {
    
    if (isset($_POST["btnSend"])) {
      $sUserName = $_POST["txtUserName"];
      $sUserPassword = $_POST["txtPassword"];
      $sUserPasswordcheck = $_POST["txtPasswordcheck"];
      
      if (trim($sUserName) == "") {
        $data[0] = "usernameempty" ;
      }
      else if (trim($sUserPassword) == "") {
        $data[0] = "passwordempty" ;
      }
      else {
        if($sUserPasswordcheck != $sUserPassword) {
          $data[0] = "passwordnotsame" ;
        }
        else {
          
          $member = $this->model("registration_mod");
          $checknum = $member->registration_check($sUserName);
          
          if($checknum == 1) {
            $data[0] = "sernameused" ;
          }
          else {
            $member->registration_write($sUserName,$sUserPassword,$_POST["txtGender"],$_POST["txtPhoneNumber"]);
            $data[0] = "registrationsuccess" ;
          }
        }
      }
    }
  $this->view("registration",$data);
  }
    
}
?>