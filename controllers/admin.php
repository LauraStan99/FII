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

    /**
     * listez toate produsele din baza de date a aplicatiei in functie de pagina pe care se afla adminul
     * daca nu este setata nicio pagina in url, este considerat ca este prima pagina, astfel se ia de pagina din url
     * selectez produsele in functie de limita nr-ului de produse pe o pagina si pagina pe ca se afla adminul
     */
    public function listareProduse()
    {
        $limit = 10;
        if (isset($_GET["page"])) {
            $this->view->page = $_GET["page"];
        } else {
            $this->view->page = 1;
        };

        $start_from = ($this->view->page - 1) * $limit;
        $product = new admin_model();
        $this->view->result = $product->selectAllProducts($start_from, $limit);
        $this->view->total_records = $product->selectCountProducts();
        $this->view->total_pages = ceil($this->view->total_records / 10);
        $this->view->render('seeProducts');
    }

    /**
     * sterg un produs din baza de date Impressed in functie de id-ul dat ca parametru
     */
    public function stergeProdus($id_produs)
    {
        $product = new admin_model();
        $product->deleteProduct($id_produs);
        header('location: ' . URL . 'admin/listareProduse');
    }

    /**
     * listez toti utilizatorii din baza de date a aplicatiei in functie de pagina pe care se afla adminul
     * daca nu este setata nicio pagina in url, este considerat ca este prima pagina, astfel se ia de pagina din url
     * selectez utilizatorii in functie de limita nr-ului de produse pe o pagina si pagina pe ca se afla adminul
     */
    public function listareUtilizatori()
    {
        $limit = 10;

        if (isset($_GET["page"])) {
            $this->view->page = $_GET["page"];
        } else {
            $this->view->page = 1;
        };

        $start_from = ($this->view->page - 1) * $limit;

        $user = new admin_model();
        $this->view->result = $user->selectAllUsers($start_from, $limit);
        $this->view->total_records = $user->selectCountUsers();
        $this->view->total_pages = ceil($this->view->total_records / 10);
        $this->view->render('seeUsers');
    }

    /**
     * sterg un utilizator in functie de id-ul dat ca parametru
     */
    public function stergeUtilizator($id_utilizator)
    {
        $product = new admin_model();
        $product->deleteUser($id_utilizator);
        header('location: ' . URL . 'admin/listareUtilizatori');
    }

    /**
     * distrug sesiunea asociata utilizatorului curent
     * redirectionez adminul delogat catre pagina de login
     */
    public function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
    }

    /**
     * functie care adauga un produs de imbracaminte in baza de date
     * daca este apasat butonul de a submit, adica de 'Adauga produs',
     * validez toate input-urile ce trebuiau completate pentru adaugarea noului produs
     * nume, descriere, culoare, material, gen, categorie, tip
     * daca toate campurile au fost completate corect si respecta validarile,
     * toate datele sunt inserate in baza de date
     * iar adminul va primi si un mesaj de confirmare
     */
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

    /**
     * listez pagina de stergereProdusDupaId
     * daca butonul cauta a fost apasat, si id-ul unui produs a fost introdus
     * se afiseaza toate datele despre acel produs
     */
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

    /**
     * sterg un produs dupa id
     */
    public function stergeProdusIntrodus($id_produs)
    {
        $product = new admin_model();
        $product->deleteProduct($id_produs);
        header('location: ' . URL . 'admin/stergereProdus');
    }

    /**
     * daca butonul de cauta a fost apasat,
     * se face un select in tabela de produse
     * si se afiseaza toate datele despre produsul cu id-ul cautat
     * exista cate un input pentru fiecare detaliu despre un produs
     * nume, descriere, culoare, material, gen, categorie, tip
     * adminul poate actuala oricare dintre acestea
     * noile date din input-urile completate sunt updata-te in baza de date Impressed
     * este randata pagina de modificare a unui produs
     */
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
                    $admin->updateProductType($_POST['tip-prod'], $_POST['cauta-produs']);
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

    /**
     * se randeaza pagina de statisticaComenzi
     * se afiseaza statistica comenzilor efectuate pe zile incepand cu jumatatea lunii mai
     */
    public function statisticaComenzi()
    {
        $admin = new admin_model();
        $this->view->result = $admin->selectStatisticaComenzi();
        $this->view->render('statisticaComenzi');
    }

    /**
     * se randeaza pagina de statisticaComenzi
     * se afiseaza statistica celor mai achizitionate subcategorii de produse de femei
     */
    public function statisticaProduseFemei()
    {
        $admin = new admin_model();
        $this->view->result = $admin->selectStatisticaProduseFemei();
        $this->view->render('statisticaProduseFemei');
    }

    /**
     * se randeaza pagina de statisticaComenzi
     * se afiseaza statistica celor mai populare produse din populatie 
     */
    public function statisticaCeleMaiPopulareProduse()
    {
        $admin = new admin_model();
        $this->view->result = $admin->selectStatisticaProdusePopulare();
        $this->view->render('statisticaCeleMaiPopulareProduse');
    }

    /**
     * se randeaza pagina de statisticaComenzi
     * se afiseaza statistica comenzilor in functie de metoda de plata cash/card
     */
    public function statisticaPlataComenzi()
    {

        $admin = new admin_model();
        $this->view->result = $admin->selectStatisticaPlataComenzi();
        $this->view->render('statisticaPlataComenzi');
    }

    /**
     * se randeaza pagina de statisticaComenzi
     * se afiseaza statistica comenzilor efectuate in Europa
     */
    public function statisticaComenziEuropa()
    {
        $admin = new admin_model();
        $this->view->result = $admin->selectStatisticaComenziEuropa();
        $this->view->render('statisticaComenziEuropa');
    }

    /**
     * se creeaza un fisier csv pentru statistica comenzilor ce va putea fi exportat
     */
    public function createCsvStatisticaComenzi()
    {
        $admin = new admin_model();
        $admin->createCsvStatisticaComenzi();
    }

     /**
     * se creeaza un fisier csv pentru statistica comenzilor din europa ce va putea fi exportat
     */
    public function createCsvStatisticaComenziEuropa()
    {
        $admin = new admin_model();
        $admin->createCsvStatisticaComenziEuropa();
    }

     /**
     * se creeaza un fisier csv pentru statistica comenzilor in functie de metoda de plata ce va putea fi exportat
     */
    public function createCsvStatisticaPlataComenzi()
    {
        $admin = new admin_model();
        $admin->createCsvStatisticaPlataComenzi();
    }

     /**
     * se creeaza un fisier csv pentru statistica celor mai achizitionate subcategorii de produse de femei ce va putea fi exportat
     */
    public function createCsvStatisticaProduseFemei()
    {
        $admin = new admin_model();
        $admin->createCsvStatisticaProduseFemei();
    }

     /**
     * se creeaza un fisier csv pentru statistica celor mai populare produse din aplicatie ce va putea fi exportat
     */
    public function createCsvStatisticaCeleMaiPopulareProduse()
    {
        $admin = new admin_model();
        $admin->createCsvStatisticaCeleMaiPopulareProduse();
    }
}
