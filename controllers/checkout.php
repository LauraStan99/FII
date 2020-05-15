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
        if(isset($_POST['submit'])){
        if($this->view->numeErr == "" && $this->view->prenumeErr == "" && $this->view->emailErr == "" && $this->view->adresaErr == "" && $this->view->orasErr == "" && $this->view->taraErr == "" && $this->view->paymentErr == "" && $this->view->livrareErr == "")
        {
            if($this->view->payment == 'card')
            {
                header('location: ' . URL . 'payment');
            }
            else{
                header('location: ' . URL . 'home');
            }

        }
    }
        $this->view->render('checkout');
    }
}
