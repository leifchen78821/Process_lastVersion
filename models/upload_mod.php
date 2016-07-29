<?php
// require_once("config/databasecalling_mod.php");

class upload_mod {
    function settingcookieuserName() {
        $userName = $_COOKIE["userName"] ;
        return $userName ;
    }
    
    function ArticlegetinPOST($file_tmp_name,$file_name,$sUserName,$S1,$address_X,$address_Y,$title,$article) {
        session_start();

        $_SESSION['Name'] = $sUserName ;
        $_SESSION['source'] = $S1 ;
        $_SESSION['address_X'] = $address_X ;
        $_SESSION['address_Y'] = $address_Y ;
        $_SESSION['title'] = $title ;
        $_SESSION['article'] = $article ;
        $_SESSION['image'] = $file_name ;
        $_SESSION['image_tmp'] = $file_tmp_name ;
        move_uploaded_file($file_tmp_name,"./views/upload/" . $file_name);
                
    }
    
    function stategoing() {
        if($_SESSION['state'] == "food") {
            		header("Location: ../page_food/page_food");
            		$this->sessiondestroy();
            		exit();
            	}
            	else {
            		header("Location: ../page_dress/page_dress");
            		$this->sessiondestroy();
            		exit();
            	}
    }
    
    function sessiondestroy() {
        session_destroy();
    }
}
?>