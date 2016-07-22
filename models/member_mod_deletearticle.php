<?php

$link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
$result = mysql_query("set names utf8" , $link);
mysql_selectdb("monographic",$link); 

$deletedata = "DELETE FROM UploadFile WHERE uID = " . $_GET["delete"] . " ; " ;
$result = mysql_query($deletedata, $link);

?>