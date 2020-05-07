<?php

class Produse extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function femei($category)
    {

        $product = new produse_model();

        $this->view->result = $product->selectWomanCategory($category);
        $this->view->category = $category;
        $this->view->render('womenProducts');
    }
    public function femeiOrder($category, $order, $filter)
    {
        $product = new produse_model();
        $this->view->result = $product->selectOrder('femei', $category, $order, $filter);
        $this->view->category = $category;
        $this->view->render('womenProducts');
    }

    public function barbati($category)
    {
        $product = new produse_model();

        $this->view->result = $product->selectManCategory($category);
        $this->view->category = $category;
        $this->view->render('menProducts');
    }
    public function barbatiOrder($category, $order, $filter)
    {
        $product = new produse_model();
        $this->view->result = $product->selectOrder('barbati', $category, $order, $filter);
        $this->view->category = $category;
        $this->view->render('menProducts');
    }

    public function copii($category)
    {
        $product = new produse_model();

        $this->view->result = $product->selectChildrenCategory($category);
        $this->view->category = $category;
        $this->view->render('childrenProducts');
    }
    public function copiiOrder($category, $order, $filter)
    {
        $product = new produse_model();
        $this->view->result = $product->selectOrder('copii', $category, $order, $filter);
        $this->view->category = $category;
        $this->view->render('childrenProducts');
    }

    public function produs($id_product){
        $product = new produse_model();
        $this->view->result = $product->selectProduct($id_product);
        $this->view->render('productPage');
    }


}
