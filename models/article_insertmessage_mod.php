<?php
require_once("databasecalling_mod.php");

class article_insertmessage_mod extends databasecalling_mod{

    function article_insertmessage($aID,$Name,$Mess) {
        date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s") ;
        $insertMessage ="INSERT INTO Message (
                            ArticleNumber,
                            Name,
                            Time,
                            MessageSent) 
        			        VALUES ( 
            				'{$aID}' , 
            				'{$Name}' , 
            				'{$time}' , 
            				'{$Mess}' )";  
        $result = $this->databasecalling($insertMessage) ;
    }
}
?>