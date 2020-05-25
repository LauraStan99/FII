<?php

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('adminAccount');
    }

    public function listareProduse()
    {
        $product = new produse_model();
        $this->view->result = $product->selectAllProducts();
        $this->view->render('seeProducts');
    }
}
?>