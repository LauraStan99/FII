<?php

class Account extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * daca butonul "Schimba" este apasat,
     * validez campul/campurile pe care utilizatorul vrea sa le schimbe
     * daca datele noi introduse sunt corecte, sunt actualizate in baza de date
     */
    public function index()
    {
        $validate = new Validate();
        $user = new User_model();

        if (isset($_POST["submit"])){

            $validate->changeLastName($this->view->nume, $this->view->numeErr);
            $validate->changeFirstName($this->view->prenume, $this->view->prenumeErr);
            $validate->changeEmail($this->view->email, $this->view->emailErr);
            $validate->changeAddress($this->view->adresa, $this->view->adresaErr);
            $validate->changePhone($this->view->telefon, $this->view->telefonErr);
            $validate->changePassword($this->view->parola, $this->view->parolaErr);              

            if(isset($this->view->nume)) $user->updateLastName($this->view->nume);
            if(isset($this->view->prenume)) $user->updateFirstName($this->view->prenume);
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
