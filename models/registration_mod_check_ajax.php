<?php

$link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
$result = mysql_query("set names utf8" , $link);
mysql_selectdb("monographic",$link); 

$Member = "select * from MemberProfile ;" ;
$result = mysql_query($Member, $link);
$i = 0 ;
while($row = mysql_fetch_assoc($result)) {
    if($_GET["userName"] == $row["Name"]){
        $i = 1 ;
    }
}
if($i == 0) {
    $ref = true;
}
else {
    $ref = false;
}
echo $ref;

?>