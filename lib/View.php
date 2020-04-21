<?php

class View{
    function __construct()
    {
        echo 'This is the view';
    }

    public function rend($name){
        require 'view/' . $name . '.php';
    }
}
?>