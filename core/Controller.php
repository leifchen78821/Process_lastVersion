<?php

class Controller {
    public function model($model) {
        require_once "../_Feng_Chia_Web_EasyMVC/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        require_once "../_Feng_Chia_Web_EasyMVC/views/$view.php";
    }
}

?>