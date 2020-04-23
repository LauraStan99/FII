<?php

class Wishlist extends Controller{

    function __construct()
    {
        parent:: __construct();
    }

    function empty(){
        require 'views/wishlistEmpty.php';
    }

    function signed(){
        $this->view->render('../wishlistSignIn');
    }
}

?>