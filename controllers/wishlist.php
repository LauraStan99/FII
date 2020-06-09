<?php

class Wishlist extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
/**
 * aici se randeaza pagina de wishlistEmpty, pentru cazul in care lista de produse preferate este goala
 */
    function empty()
    {
        $this->view->render('wishlistEmpty');
    }

    /**
     * calculez nr de produse din wishlist
     * daca exista produse, le afisez, respectiv randez pagina de wishlist
     * altfel, randez pagina predefinita ca wishlist-ul este gol
     */
    function index(){
        $wishlist = new Wishlist_model();
        $button = new Butoane_model();
        $countWishlistProducts = $button->countWishlistProducts();
        if($countWishlistProducts > 0)
        {
            $this->view->result = $wishlist->selectWishlistProducts();
            $this->view->render('wishlist');
        }
        else $this->view->render('wishlistEmpty');
    }
    
/**
 * in functie de id-ul produsului si de marimea selectata ,
 * introduc produsul in cosul de cumparaturi al utilizatorului,
 * ramanand pe pagina de wishlist
 */
    public function addToCart($id_product, $size){

        $button = new Butoane_model();
        $button->addToCart($id_product, $size);
        header('location: ' . URL . 'wishlist');
    }
/**
 * aavand id-ul produsului si marimea acestuia , 
 * apelam functia care sterge produsul din lista de produse preferate
 * ramanand pe pagina de wishlist
 */
    public function deleteFromWishlist($id_product, $size){
        $buton = new Butoane_model();
        $buton->deleteFromWishlist($id_product, $size);
        header('location: ' . URL . 'wishlist');
    }
}
