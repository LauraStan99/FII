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
        $product = new admin_model();
        $this->view->result = $product->selectAllProducts();
        $this->view->render('seeProducts');
    }
    public function stergeProdus($id_produs)
    {
        $product = new admin_model();
        $this->view->result = $product->deleteProduct($id_produs);
        header('location: ' . URL . 'admin/listareProduse');
    }
    public function listareUtilizatori()
    {
        $user = new admin_model();
        $this->view->result = $user->selectAllUsers();
        $this->view->render('seeUsers');
    }
    public function stergeUtilizator($id_utilizator)
    {
        $user = new admin_model();
        $this->view->result = $user->deleteUser($id_utilizator);
        header('location: ' . URL . 'admin/listareUtilizatori');
    }

}
