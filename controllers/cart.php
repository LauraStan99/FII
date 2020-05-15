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
            if (isset($_GET['id']) && isset($_GET['marime'])) {
                $buton->deleteFromCart($_GET['id'], $_GET['marime']);
                if ($count == 1) {
                    header('location: ' . URL . 'home');
                } else {
                    header('location: ' . URL . 'cart');
                }
            }
        }
        if (isset($_POST['buttonPlus'])) {
            if (isset($_GET['id']) && isset($_GET['marime'])) {
               $buton->addQuantity($_GET['id'], $_GET['marime']);
               header('location: ' . URL . 'cart');
            }
        }
        if (isset($_POST['buttonMinus'])) {
            if (isset($_GET['id']) && isset($_GET['marime'])) {
               $quantity = $buton->getQuantity($_GET['id'], $_GET['marime']);
               if($quantity == 1){
                $buton->deleteFromCart($_GET['id'], $_GET['marime']);
               }
               $buton->subtractQuantity($_GET['id'], $_GET['marime']);
               header('location: ' . URL . 'cart');
            }
        }
        if ($count > 0) {
            $totalPrice = $cart->selectCartTotalPrice();
            $this->view->totalPrice = $totalPrice;
            if($this->view->totalPrice >= 350){
                $this->view->livrare = 0;
            }
            else{
                $this->view->livrare = 20;
            }
            $this->view->render('cartFull');
        } else {
            $this->view->render('cartEmpty');
        }
    }

    public function addCommand(){

        $cart = new Cart_model();
        $cart->addToCommand();
        $id_comanda = $cart->selectIdComanda();
        header('location: ' . URL . 'checkout?id_comanda='.$id_comanda);
    }
    
}
