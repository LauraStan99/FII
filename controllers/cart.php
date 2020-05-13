<?php


class Cart extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $cart = new Cart_model();
        $this->view->result = $cart->selectCartProducts();
        if(isset($_POST['x-sterge'])){
            if(isset($_GET['id']))
            {
                $buton = new Butoane_model();
                $count = $buton->countProductsCart();
                $buton->deleteFromCart($_GET['id']);
                if($count == 1){
                    header('location: ' . URL . 'home');
                }
                else{
                    header('location: ' . URL . 'cart');
                }
                
                
            }
        }
        $this->view->render('cartFull');
    }
}
