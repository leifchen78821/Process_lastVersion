<?php
// require_once("config/databasecalling_mod.php");

class update_mod {

    function update($uID) {
        // $Member = "SELECT * FROM UploadFile WHERE uID = '" . $uID . "' ;" ;
        // $result = $this->databasecalling($Member) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $Member = "SELECT * FROM `UploadFile` WHERE `uID` = :uID ;" ;
        
        $prepare = $pdolink->prepare($Member);
        $prepare->bindParam(':uID',$uID);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
        return $result ;
    }
    
    function settingcookieuserName() {
        $userName = $_COOKIE["userName"] ;
        return $userName ;
    }
    
    function ArticleIDinsession($ArticleID) {
        session_start();
        if($ArticleID != "") {
            $_SESSION['uID'] = $ArticleID ;
        }
    }
    
    function Articlegetinrow() {
        session_start();
        $resultArticleGet = $this->update($_SESSION['uID']);
        	
        	$row = $resultArticleGet[0];
        
            $_SESSION['image'] = $row["ImageSite"] ;
            
            if($_SESSION['change'] == 0) {
                $_SESSION['uID'] = $row["uID"] ;
                $_SESSION['Name'] = $row["Name"] ;
                $_SESSION['source'] = $row["MapSite"] ;
                $_SESSION['address_X'] = $row["Map_X"] ;
                $_SESSION['address_Y'] = $row["Map_Y"] ;
                $_SESSION['title'] = $row["Title"] ;
                $_SESSION['article'] = $row["Article"] ;
                
            }
    }
    
    function ArticlegetinPOST($file_tmp_name,$file_name,$sUserName,$S1,$address_X,$address_Y,$title,$article) {
        session_start();
        if($file_tmp_name != '') {
                    $_SESSION['image'] = $file_name ;
                    $_SESSION['image_tmp'] = $file_tmp_name ;
                    move_uploaded_file($file_tmp_name,"./views/upload/" . $file_name);
                }
                
                $_SESSION['Name'] = $sUserName ;
                $_SESSION['source'] = $S1 ;
                $_SESSION['address_X'] = $address_X ;
                $_SESSION['address_Y'] = $address_Y ;
                $_SESSION['title'] = $title ;
                $_SESSION['article'] = $article ;
                
                $_SESSION['change'] = 1 ;
    }
    
    function sessiondestroy() {
        session_destroy();
    }
}
?>