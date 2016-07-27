<?php
class databasecalling_mod{
    function databasecalling($call) {
        $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        $result = mysql_query("set names utf8" , $link);
        mysql_selectdb("monographic",$link); 
        $result = mysql_query($call, $link);
        return $result;
    }
}
?>