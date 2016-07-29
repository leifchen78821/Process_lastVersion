<?php

class index_mod {
    function settingcookie() {
        setcookie("userName" , "Guest" , time()+7200 , "/");
    }
}

?>