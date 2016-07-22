<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>逢甲大玩客 - 會員註冊</title>
    <link rel="stylesheet" type="text/css" href="../views/css/login.css">
    <link rel="stylesheet" type="text/css" href="../views/css/registration.css">
    <script src="../views/js/jquery-1.9.1.min/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../views/js/joincheck.js"></script>
  </head>
  <body>
    <form id="form1" name="form1" method="post">
        <div align="center" id="back_index" style="height: 800px; border-radius:20%;">
          <span style="color: white; ">會員系統 - 註冊<br><br><br><br><br><br><br><br><br><br><br><br>
            <div id="circle_regis" style=""> 
            <br><br>
            <br>帳號<span style="color:red">*(必填)</span>：
              <input type="text" placeholder="輸入使用帳號" name="txtUserName" id="txtUserName" value="<?php echo $sUserName ;?>" pattern="[A-z 0-9]{1,20}" title="請輸入20字元內的英數字"/>
              <br>
              <div name="mas1" id="mas1" style = "font-size : 10px ; color : red ; ">
              </div>
            <br>密碼<span style="color:red">*(必填)</span>：
              <input type="password" name="txtPassword" id="txtPassword" />
            <br><br>密碼確認<span style="color:red">*(必填)</span>：
              <input type="password" name="txtPasswordcheck" id="txtPasswordcheck" />
              <br>
              <div name="mas2" id="mas2" style = "font-size : 10px ; color : red ; ">
              </div>
            <br>性別：
              <label><input name="txtGender" type="radio" value="1" checked="checked" />男 </label>
              <label><input name="txtGender" type="radio" value="0" />女 </label>
            <br><br>電話：
              <input type="text" name="txtPhoneNumber" id="txtPhoneNumber" />
        </div>
            <div class = "regis_atuo_string regis_atuo_string_middle_go" id = "atuo_string_01"></div>
            <div class = "regis_atuo_string regis_atuo_string_long" id = "atuo_string_02"></div>
            <div class = "regis_atuo_string regis_atuo_string_middle_ba" id = "atuo_string_03"></div>
            <div class = "regis_atuo_string regis_atuo_string_short" id = "atuo_string_04"></div>
            <div class = "regis_atuo_string regis_atuo_string_middle_go" id = "atuo_string_05"></div>
            <div class = "regis_atuo_string regis_atuo_string_long" id = "atuo_string_06"></div>
            <div class = "regis_atuo_string regis_atuo_string_middle_ba" id = "atuo_string_07"></div>
            <div class = "regis_atuo_string regis_atuo_string_short" id = "atuo_string_08"></div>
      <span style="">
        <input type="submit" class="but" name="btnSend" id="btnSend" value="送出" style="width:170px;" />
      </span>
    </form>
  </body>
</html>