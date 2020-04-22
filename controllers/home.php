<?php

class Home extends Controller{
    function __construct()
    {
        
    }

    function inregistrare(){
        require 'inregistrare.php';
        $controller = new Inregistrare();
        $controller->inregistrare();
    }
}

?>