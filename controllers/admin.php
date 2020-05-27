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
        $product->deleteProduct($id_produs);
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
        $product = new admin_model();
        $product->deleteUser($id_utilizator);
        header('location: ' . URL . 'admin/listareUtilizatori');
    }

    public function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
    }
    public function adaugaProdus()
    {
        $validate = new Validate();
        $admin = new admin_model();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

            $validate->validateEmptyInput($_POST['nume'], $this->view->numeErr, $this->nume);
            $validate->validateEmptyInput($_POST['descriere'], $this->view->descriereErr, $this->descriere);
            $validate->validatePrice($this->view->pret, $this->view->pretErr);
            $validate->validateEmptyInput($_POST['material'], $this->view->materialErr, $this->material);
            $validate->validateEmptyInput($_POST['culoare'], $this->view->culoareErr, $this->culoare);
            $validate->validateEmptyInput($_POST['gen'], $this->view->genErr, $this->gen);
            $validate->validateEmptyInput($_POST['categorie'], $this->view->categorieErr, $this->categorie);
            $validate->validateEmptyInput($_POST['tip'], $this->view->tipErr, $this->tip);
        }


        if (isset($_POST["submit"])) {
            if ($this->view->numeErr == "" && $this->view->descriereErr == "" && $this->view->pretErr == "" && $this->view->materialErr == "" && $this->view->culoareErr == "" && $this->view->genErr == "" && $this->view->categorieErr == "" && $this->view->tipErr == "") {
                $imagine = substr_replace($_POST["imagine"], "", -4);

                $insert_data = array(
                    'nume' => $_POST["nume"], 'pret' => $_POST["pret"], 'material' => $_POST["material"],
                    'imagine' => $imagine, 'descriere' => $_POST["descriere"], 'tip' => $_POST["tip"],
                    'gen' => $_POST["gen"], 'categorie' => $_POST["categorie"], 'culoare' => $_POST["culoare"],

                );
                $admin->insertNewProduct($insert_data);
                $this->view->succes = "Datele au fost inserate cu succes.";
            }
        }
        $this->view->render('addProduct');
    }
    public function stergereProdusDupaId()
    {
        $admin = new admin_model();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cauta"])) {
            if (isset($_POST['cauta-produs'])) {
                $this->view->result = $admin->selectProductById($_POST['cauta-produs']);
            }
        }

        $this->view->render('stergereProdus');
    }
    public function stergeProdusIntrodus($id_produs)
    {
        $product = new admin_model();
        $product->deleteProduct($id_produs);
        header('location: ' . URL . 'admin/stergereProdus');
    }
    public function modificaProdus()
    {
        $admin = new admin_model();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["cauta"])) {
                if (isset($_POST['cauta-produs'])) {
                    $this->view->result = $admin->selectProductById($_POST['cauta-produs']);
                    $this->view->id_produs = $_POST['cauta-produs'];
                }
            }

            if (isset($_POST["submit"])) {

                if (!empty($_POST['pret-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductPrice($_POST['pret-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['nume-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductName($_POST['nume-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['material-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductMaterial($_POST['material-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['imagine-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductImage(substr_replace($_POST['imagine-prod'], "", -4), $_POST['cauta-produs']);
                }
                if (!empty($_POST['descriere-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductDescription($_POST['descriere-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['gen-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductGender($_POST['gen-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['tip-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductTipe($_POST['tip-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['categorie-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductCategory($_POST['categorie-prod'], $_POST['cauta-produs']);
                }
                if (!empty($_POST['culoare-prod']) && isset($_POST['cauta-produs'])) {
                    $admin->updateProductColor($_POST['culoare-prod'], $_POST['cauta-produs']);
                }
            }
        }
        $this->view->render('modifyProduct');
    }
}
