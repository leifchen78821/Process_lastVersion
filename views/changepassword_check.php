<?php

if($data[0] == "errorin") {
  echo "<script language='JavaScript'>";
	echo "alert('你不應該來這呦!!!');location.href='../connect4site/connect4site';";
	echo "</script>";
}
elseif($data[0] == "notYou") {
  echo "<script language='JavaScript'>";
  echo "alert('您輸入的帳號不是你的呦');";
  echo "</script>";
}
elseif($data[0] == "wrongPassword") {
  echo "<script language='JavaScript'>";
  echo "alert('密碼輸入有誤');";
  echo "</script>";
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>逢甲大玩客 - 修改密碼</title>
    <link rel="stylesheet" type="text/css" href="../views/css/login.css">
  </head>
  <body>
    <form data-ajax="false" id="form1" name="form1" method="post">
      <div align="center" id="back_index" style="">
        <span style="color: white;">會員系統 - 修改密碼<br><br><br><br><br><br><br><br></span>
        <div id="circle" style=""> 
          <div style="color: #778899 ; top: 52% ; left: -410px ;"><br>帳號</div>
          <div valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></div>
          <div style="color: #778899 ; top: 52% ; left: -410px ;"><br>密碼</div>
          <div valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></div>
          <input type="submit" class="but" name="btnOK" id="btnOK" value="送出" />
          <input type="reset" class="but" name="btnReset" id="btnReset" value="重設" />
          <div id = "loginimg" name = "loginimg"  style = "background-image: url(../views/img/login.jpg);">
        </div>
      </div>
    </form>
  </body>
</html>