// <?php
// require("../controllers/login_con.php");
// ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>逢甲大玩客 - 會員登入</title>
    <link rel="stylesheet" type="text/css" href="../views/css/login.css">
  </head>
  <body>
    <form data-ajax="false" id="form1" name="form1" method="post">
      <div align="center" id="back_index">
        <span style="color: white;" style = "">會員系統 - 登入<br><br><br><br><br><br><br><br></span>
        <div id="circle" style=""> 
          <div id = "loginimg" name = "loginimg"  style = "background-image: url(../views/img/login.jpg);"></div>
          <div style="color: #778899 ; top: 52% ; left: -410px ;"><br>帳號</div>
          <div valign="baseline"><input type="text" name="txtUserName" id="txtUserName" value="<?php echo $sUserName ;?>" /></div>
          <div style="color: #778899 ; top: 52% ; left: -410px ;"><br>密碼</div>
          <div valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></div>
          <input type="submit" class="but" name="btnOK" id="btnOK" value="登入" />
          <input type="reset" class="but" name="btnReset" id="btnReset" value="重設" />
        </div>
        <span style="">
          <input type="submit" class="but" name="btnRegis" id="btnRegis" value="註冊會員" style="width:170px;" />
        </span>
      </div>
    </form>
  </body>
</html>