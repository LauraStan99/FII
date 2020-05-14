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

    function index(){
        $wishlist = new Wishlist_model();
        $buton = new Butoane_model();
        $count = $buton->countProductsWishlist();
        $this->view->result = $wishlist->selectWishlistProducts();
        if($count>0){
            $this->view->render('wishlist');
        }
        else{
            $this->view->render('wishlistEmpty');
        }
        
    }

    public function addToCart($id_product, $size){

        $button = new Butoane_model();
        $count = $button->selectProductCart($id_product, $size);
        if($count != 0)
        {
            $button->addQuantity($id_product, $size);     
        }
        else
        {
            $button->addToCart($id_product, $size);
        }
        header('location: ' . URL . 'wishlist');
    }

    public function deleteFromWishlist($id_product, $size){
        $buton = new Butoane_model();
        $buton->deleteFromWishlist($id_product, $size);
        header('location: ' . URL . 'wishlist');
    }
}
