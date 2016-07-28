<?php
// require_once("config/databasecalling_mod.php");

class upload_preview_send_mod {
    function upload_preview_send($Name,$state,$resultArticleNumGet,$title,$article,$image,$source,$address_X,$address_Y) {
		// date_default_timezone_set('Asia/Taipei');
		// $time = date("Y-m-d H:i:s") ;
		
		// $insertData ="INSERT INTO UploadFile (
		// 					Name,
		// 					State,
		// 					Time,
		// 					ArticleNumber,
		// 					Title,
		// 					Article,
		// 					ImageSite,
		// 					MapSite,
		// 					Map_X,
		// 					Map_Y) 
		// 				VALUES ( 
		// 					'{$Name}' , 
		// 					'{$state}' , 
		// 					'{$time}' , 
		// 					'{$resultArticleNumGet}' , 
		// 					'{$title}' , 
		// 					'{$article}' , 
		// 					'{$image}' , 
		// 					'{$source}' , 
		// 					'{$address_X}' , 
		// 					'{$address_Y}')";  
		// $result = $this->databasecalling($insertData) ;
		
		date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s") ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
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
							:Name , 
							:state , 
							:time , 
							:resultArticleNumGet , 
							:title , 
							:article , 
							:image , 
							:source , 
							:address_X , 
							:address_Y)";  
        
        $prepare = $pdolink->prepare($insertData);
        $prepare->bindParam(':Name',$Name);
        $prepare->bindParam(':state',$state);
        $prepare->bindParam(':time',$time);
        $prepare->bindParam(':resultArticleNumGet',$resultArticleNumGet);
        $prepare->bindParam(':title',$title);
        $prepare->bindParam(':article',$article);
        $prepare->bindParam(':image',$image);
        $prepare->bindParam(':source',$source);
        $prepare->bindParam(':address_X',$address_X);
        $prepare->bindParam(':address_Y',$address_Y);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
	}
}
?>