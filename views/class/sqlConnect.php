<?php

class dbconnect
{
    
    function conn($cmd)
    {
        
        $link = mysql_connect("localhost" , "root" , "") ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link);
        $result = mysql_query($cmd, $link);
        return $result; 
    }
    
}

?>