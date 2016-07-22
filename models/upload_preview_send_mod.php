<?php

date_default_timezone_set('Asia/Taipei');
$time = date("Y-m-d H:i:s") ;

$insertData ="INSERT INTO UploadFile (Name,State,Time,ArticleNumber,Title,Article,ImageSite,MapSite,Map_X,Map_Y) 
				VALUES ( 
					'{$_SESSION['Name']}' , 
					'{$_SESSION['state']}' , 
					'{$time}' , 
					'{$NameArticleNumber}' , 
					'{$_SESSION['title']}' , 
					'{$_SESSION['article']}' , 
					'{$_SESSION['image']}' , 
					'{$_SESSION['source']}' , 
					'{$_SESSION['address_X']}' , 
					'{$_SESSION['address_Y']}')";  
					
$result = mysql_query($insertData, $link);

?>