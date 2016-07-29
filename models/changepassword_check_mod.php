<?php
// require_once("config/databasecalling_mod.php");

class changepassword_check_mod {
    function settingcookie() {
        $sUserName = $_COOKIE["userName"] ;
        return $sUserName ;
    }
}

?>