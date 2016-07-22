<?php

$link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
$result = mysql_query("set names utf8" , $link);
mysql_selectdb("monographic",$link);

$commandText = "select * from MemberProfile";
$result = mysql_query($commandText, $link);

?>