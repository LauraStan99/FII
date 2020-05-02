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
            $valid->changeAddress($this->view->adresa, $this->view->adresaErr);
            $valid->changePhone($this->view->telefon, $this->view->telefonErr);
            $valid->changePassword($this->view->parola, $this->view->parolaErr);
        }
        if (isset($_POST["submit"])) {                 

            if(isset($this->view->nume)) $user->updateName($this->view->nume);
            if(isset($this->view->prenume)) $user->updatePrenume($this->view->prenume);
            if(isset($this->view->email)) $user->updateEmail($this->view->email);
            if(isset($this->view->adresa)) $user->updateAddress($this->view->adresa);
            if(isset($this->view->telefon)) $user->updatePhone($this->view->telefon);
            if(isset($this->view->parola)) $user->updatePassword($this->view->parola);

            if ($this->view->numeErr == "" && $this->view->prenumeErr == "" && $this->view->emailErr == "" && $this->view->telefonErr == "" && $this->view->adresaErr == ""  && $this->view->parolaErr == "")
            {
                $this->view->success_message = "Datele au fost actualizate cu succes.";
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
