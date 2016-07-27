<?php
require_once("databasecalling_mod.php");

class upload_preview_send_mod extends databasecalling_mod{
    function upload_preview_send($Name,$state,$resultArticleNumGet,$title,$article,$image,$source,$address_X,$address_Y) {
		date_default_timezone_set('Asia/Taipei');
		$time = date("Y-m-d H:i:s") ;
		
		$insertData ="INSERT INTO UploadFile (
							Name,
							State,
							Time,
							ArticleNumber,
							Title,
							Article,
							ImageSite,
							MapSite,
							Map_X,
							Map_Y) 
						VALUES ( 
							'{$Name}' , 
							'{$state}' , 
							'{$time}' , 
							'{$resultArticleNumGet}' , 
							'{$title}' , 
							'{$article}' , 
							'{$image}' , 
							'{$source}' , 
							'{$address_X}' , 
							'{$address_Y}')";  
		$result = $this->databasecalling($insertData) ;
	}
}
?>