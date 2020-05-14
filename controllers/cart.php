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
        $buton = new Butoane_model();
        $count = $buton->countProductsCart();
        $this->view->result = $cart->selectCartProducts();
        if (isset($_POST['x-sterge'])) {
            if (isset($_GET['id'])) {
                $buton->deleteFromCart($_GET['id']);
                if ($count == 1) {
                    header('location: ' . URL . 'home');
                    Session::set('cart', false);
                } else {
                    header('location: ' . URL . 'cart');
                    Session::set('cart', true);
                }
            }
        }
        if ($count > 0) {
            $totalPrice = $cart->selectCartTotalPrice();
            $this->view->totalPrice = $totalPrice;
            $this->view->render('cartFull');
        } else {
            $this->view->render('cartEmpty');
        }
    }
}
