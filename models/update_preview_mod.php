<?php
require_once("config/databasecalling_mod.php");

class update_preview_mod extends databasecalling_mod{

    function update_preview($uID,$source,$address_X,$address_Y,$image,$title,$article) {
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
							
		$result = $this->databasecalling($updateData) ;
	}
}
?>