<?php

class Produse extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function femei($category)
    {

        $product=new produse_model();

        $this->view->result=$product->selectWomanCategory($category);
        $this->view->category = $category;
        $this->view->render('womenProducts');
    }

    public function barbati($category){
        $product = new produse_model();

        $this->view->result = $product->selectManCategory($category);
        $this->view->category = $category;
        $this->view->render('menProducts');
    }

    public function copii($category){
        $product = new produse_model();

        $this->view->result = $product->selectChildrenCategory($category);
        $this->view->category = $category;
        $this->view->render('childrenProducts');
    }

    

}
