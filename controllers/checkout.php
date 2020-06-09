<?php
class Checkout extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $valid = new Validate();
        $checkout = new Checkout_model();
        $button = new Butoane_model();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid->validateLastName($this->view->nume, $this->view->numeErr);
            $valid->validateFirstName($this->view->prenume, $this->view->prenumeErr);
            $valid->validateEmail($this->view->email, $this->view->emailErr);
            $valid->validateAddress($this->view->adresa, $this->view->adresaErr);
            $valid->validateCity($this->view->oras, $this->view->orasErr);
            $valid->validateCountry($this->view->tara, $this->view->taraErr);
            $valid->validatePayment($this->view->payment, $this->view->paymentErr);
            $valid->validateDelivery($this->view->livrare, $this->view->livrareErr);
        }
        if(isset($_POST["submit"])){
            if($this->view->numeErr == "" && $this->view->prenumeErr == "" && $this->view->emailErr == "" && $this->view->adresaErr == "" && $this->view->orasErr == "" && $this->view->taraErr == "" && $this->view->paymentErr == "" && $this->view->livrareErr == "")
            {
                if($this->view->payment == 'card')
                {
                    $checkout->addNewCommand($_GET['id_comanda'], $this->view->nume, $this->view->prenume, $this->view->email, $this->view->adresa, $this->view->oras, $this->view->tara, $this->view->payment, $this->view->livrare);
                    header('location: ' . URL . 'payment?id_comanda=' . $_GET['id_comanda']);
                }
                else{
                    $checkout->addNewCommand($_GET['id_comanda'], $this->view->nume, $this->view->prenume, $this->view->email, $this->view->adresa, $this->view->oras,$this->view->tara, $this->view->payment, $this->view->livrare);
                    $checkout->deleteCart();
                    $button->sendEmailConfirmation($_GET['id_comanda']);
                    header('location: ' . URL . 'order');
                }
            }
        }
        if(isset($_POST['renunta'])){
            $checkout = new Checkout_model();
            $checkout->deleteCommand($_GET['id_comanda']);
            header('location: ' . URL . 'home');
        }
        $this->view->result = $checkout->selectCartProducts($_GET['id_comanda']);
        $this->view->subtotal = $checkout->selectSubtotal($_GET['id_comanda']);
        if($this->view->subtotal > 350) 
        {
            $this->view->total = $this->view->subtotal;
            $this->view->livrare = 0;
        }
        else
        {
            $this->view->total = $this->view->subtotal + 20;
            $this->view->livrare = 20;
        }
        $this->view->nrProd = $checkout->selectNrProd($_GET['id_comanda']);
        $this->view->render('checkout');
    }
}
