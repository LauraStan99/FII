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
        $user = new User();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $valid->changeLastName($this->view->nume, $this->view->numeErr);
            $valid->changeFirstName($this->view->prenume, $this->view->prenumeErr);
            $valid->changeEmail($this->view->email, $this->view->emailErr);
            $valid->changeAdress($this->view->adresa, $this->view->adresaErr);
            $valid->changePhone($this->view->telefon, $this->view->telefonErr);
            $valid->changePassword($this->view->parola, $this->view->parolaErr);
        }
        
         if (isset($_POST["submit"])) {
           if($user->updateName($this->view->nume)) {
                $this->view->success_message = "Datele au fost introduse cu succes";
            } else {
             //   $this->view->success_message = "Toate campurile campurile trebuie completate conform cerintelor.";
            }
        }

        $this->view->render('account');
    }
    public function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
    }
}
