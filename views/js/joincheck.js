function getData(val) {
	// 將帳號即時帶入php 並連結資料庫進行比對 再將比對結果回傳
    $.get("/_Feng_Chia_Web_EasyMVC/models/config/registration_mod_check_ajax.php?userName=" + val, 
        function(data)
        {
		  if(data == true)
		  {
    		$("#mas1").html("此帳號可使用");
		  }
		  if(data == false)
		  {
		    $("#mas1").html("此帳號已有人使用");
		  }
        }
  )
}
//判別密碼鎖呼叫的函式
function pasch() {
	if($("#txtPassword").val() == '') {
		$("#mas2").html("密碼不可為空");
	}
	else {
	    if($("#txtPassword").val() != $("#txtPasswordcheck").val()) {
		    $("#mas2").html("確認密碼必須相同");
		}
		else {
			$("#mas2").html("密碼相同!!");
		}
	}
}

// 網頁讀取後即開始以下程式
$(document).ready(function() {
	// 帳號
	$("#mas1").html("　");
	$("#txtUserName").on("keyup",function() {
		getData($("#txtUserName").val());
	})
	// 密碼
	$("#mas2").html("　");
	$("#txtPasswordcheck").on("keyup",function() {
        pasch();
	})
	$("#txtPassword").on("keyup",function() {
        pasch();
	})
});