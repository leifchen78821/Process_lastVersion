<?php
class article_insertmessage_mod{

    function article_insertmessage($aID,$Name,$Mess) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
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
        $result = mysql_query($insertMessage, $link);
    }
}
?>