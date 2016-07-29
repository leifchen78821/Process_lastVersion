<?php
// require_once("config/databasecalling_mod.php");

class article_insertmessage_mod {

    function article_insertmessage($aID,$Name,$Mess) {
        
        // date_default_timezone_set('Asia/Taipei');
        // $time = date("Y-m-d H:i:s") ;
        // $insertMessage ="INSERT INTO Message (
        //                     ArticleNumber,
        //                     Name,
        //                     Time,
        //                     MessageSent) 
        // 			        VALUES ( 
        //     				'{$aID}' , 
        //     				'{$Name}' , 
        //     				'{$time}' , 
        //     				'{$Mess}' )";  
        // $result = $this->databasecalling($insertMessage) ;
        
        date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s") ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $insertMessage ="INSERT INTO `Message` (
                            `ArticleNumber`,
                            `Name`,
                            `Time`,
                            `MessageSent`) 
        			        VALUES ( 
            				:aID , 
            				:Name , 
            				:time , 
            				:Mess )";
        
        $prepare = $pdolink->prepare($insertMessage);
        $prepare->bindParam(':aID',$aID);
        $prepare->bindParam(':Name',$Name);
        $prepare->bindParam(':time',$time);
        $prepare->bindParam(':Mess',$Mess);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
        
    }
}
?>