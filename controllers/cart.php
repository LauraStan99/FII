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
        $this->view->render('cartFull');
    }
}
