<?php

class Contact extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $valid = new Validate();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid->validateLastName($this->view->nume, $this->view->numeErr);
            $valid->validateFirstName($this->view->prenume, $this->view->prenumeErr);
            $valid->validateEmail($this->view->email, $this->view->emailErr);
            $valid->validatePhone($this->view->telefon, $this->view->telefonErr);
            $valid->validateMessage($this->view->mesaj, $this->view->mesajErr);
        }
        $this->view->render('contact');
    }
}
?>