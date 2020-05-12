<?php


class Cart extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        $wishlist = new Wishlist_model();
        $this->view->result = $wishlist->selectWishlistProducts();
        $this->view->render('cartFull');
    }
}
