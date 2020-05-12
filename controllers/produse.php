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

    public function produs($id_product)
    {
        $product = new produse_model();
        $buton = new butoane_model();
        $this->view->result = $product->selectProduct($id_product);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['S'])) {
                header('location: ../produs/' . $id_product . '?size=S');
            } else if (isset($_POST['M'])) {
                header('location: ../produs/' . $id_product . '?size=M');
            } else if (isset($_POST['L'])) {
                header('location: ../produs/' . $id_product . '?size=L');
            } else if (isset($_POST['XL'])) {
                header('location: ../produs/' . $id_product . '?size=XL');
            } else if (isset($_POST['XXL'])) {
                header('location: ../produs/' . $id_product . '?size=XXL');
            } else if (isset($_POST['XS'])) {
                header('location: ../produs/' . $id_product . '?size=XS');
            }
            if (isset($_POST['adauga-cos'])) {
                if (isset($_GET['size'])) {
                    $buton->addToCart($id_product, $_GET['size']);
                }
            }
            if (isset($_POST['adauga-favorite'])) {

                if (isset($_GET['size'])) {
                    $buton->addToWishlist($id_product, $_GET['size']);
                }
            }
        }
        
        $this->view->render('productPage');
    }
}
