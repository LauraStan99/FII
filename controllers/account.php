<?php

class Account extends Controller
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
            $valid->validateAdress($this->view->adresa, $this->view->adresaErr);
            $valid->validatePhone($this->view->telefon, $this->view->telefonErr);
            $valid->validatePassword($this->view->parola, $this->view->parolaErr);
        }
         $this->view->render('account');
    }
}
