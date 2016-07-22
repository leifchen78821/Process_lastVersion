<?php

class update_preview_mod{

    function update_preview($uID,$source,$address_X,$address_Y,$image,$title,$article) {
		$link = mysql_connect("localhost" , "root" , "") or die(mysql_error()) ; 
		$result = mysql_query("set names utf8" , $link);
		mysql_selectdb("monographic",$link); 
		
		date_default_timezone_set('Asia/Taipei');
		$time = date("Y-m-d H:i:s") ;
		
		$updateData = "UPDATE UploadFile SET 
						Time = '{$time}' ,
						MapSite = '{$source}' ,
						Map_X = '{$address_X}' ,
						Map_Y = '{$address_Y}' ,
						ImageSite = '{$image}' ,
						Title = '{$title}' ,
						Article = '{$article}'
						WHERE uID = '{$uID}' ";  
							
		$result = mysql_query($updateData, $link);
	}
}
?>