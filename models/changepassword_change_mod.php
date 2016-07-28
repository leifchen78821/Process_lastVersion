<?php
// require_once("config/databasecalling_mod.php");

class changepassword_change_mod {

    function changepassword_change($name,$sUserPassword) {
        // $updatePassword = "UPDATE MemberProfile SET 
        //                           Password = '{$sUserPassword}'
        // 					       WHERE Name = '{$name}' ";  
        // $result = $this->databasecalling($updatePassword) ;
        
        $pdo = new databasecalling_mod ;
        $pdolink = $pdo->startConnection() ;
        
        $updatePassword = "UPDATE MemberProfile SET 
                                  Password = :sUserPassword
        					       WHERE Name = :name "; 
        
        $prepare = $pdolink->prepare($updatePassword);
        $prepare->bindParam(':sUserPassword',$sUserPassword);
        $prepare->bindParam(':name',$name);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeConnection();
    }
}
?>