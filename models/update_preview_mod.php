<?php
// require_once("config/databasecalling_mod.php");

class update_preview_mod {

    function update_preview($uID,$source,$address_X,$address_Y,$image,$title,$article) {
		// date_default_timezone_set('Asia/Taipei');
		// $time = date("Y-m-d H:i:s") ;
		
		// $updateData = "UPDATE UploadFile SET 
		// 				Time = '{$time}' ,
		// 				MapSite = '{$source}' ,
		// 				Map_X = '{$address_X}' ,
		// 				Map_Y = '{$address_Y}' ,
		// 				ImageSite = '{$image}' ,
		// 				Title = '{$title}' ,
		// 				Article = '{$article}'
		// 				WHERE uID = '{$uID}' ";  
							
		// $result = $this->databasecalling($updateData) ;
		
		date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s") ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $updateData = "UPDATE UploadFile SET 
						Time = :time ,
						MapSite = :source ,
						Map_X = :address_X ,
						Map_Y = :address_Y ,
						ImageSite = :image ,
						Title = :title ,
						Article = :article
						WHERE uID = :uID ";  
        
        $prepare = $pdolink->prepare($updateData);
        $prepare->bindParam(':time',$time);
        $prepare->bindParam(':source',$source);
        $prepare->bindParam(':address_X',$address_X);
        $prepare->bindParam(':address_Y',$address_Y);
        $prepare->bindParam(':image',$image);
        $prepare->bindParam(':title',$title);
        $prepare->bindParam(':article',$article);
        $prepare->bindParam(':uID',$uID);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
		
	}
}
?>