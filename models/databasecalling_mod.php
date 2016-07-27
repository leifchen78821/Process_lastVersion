<?php
class databasecalling_mod{
    function databasecalling($call) {
        // $link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
        // $result = mysql_query("set names utf8" , $link);
        // mysql_selectdb("monographic",$link); 
        // $result = mysql_query($call, $link);
        
        $db = new PDO("mysql:host=localhost;dbname=monographic", "root", "");
        $db->exec("SET CHARACTER SET utf8");
        $result = $db->prepare($call);
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
?>