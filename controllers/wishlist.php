<?php

class Wishlist extends Controller{

    function __construct()
    {
        parent:: __construct();
    }

    function empty(){
        $this->view->render('wishlistEmpty');
    }

    function signed(){
        $this->view->render('wishlistSignIn');
    }
}

?>