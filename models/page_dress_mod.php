<?php

class page_dress_mod{

    function page_dress() {

        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        
        $Member = "select * from UploadFile where State = 'dress' order by Time desc ;" ;
        $result = mysql_query($Member, $link);
        return $result ;
    }
    
}

?>