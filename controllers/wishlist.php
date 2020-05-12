<?php

class Wishlist extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function empty()
    {
        $this->view->render('wishlistEmpty');
    }

    function favorite(){
        $wishlist = new Wishlist_model();
        $this->view->result = $wishlist->selectWishlistProducts();
        $this->view->render('wishlist');
    }
}
