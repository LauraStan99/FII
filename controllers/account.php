<?php

class Account extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->view->render('account');
    }


    /**
     * daca butonul "Schimba" este apasat,
     * validez campul/campurile pe care utilizatorul vrea sa le schimbe
     * daca datele noi introduse sunt corecte, sunt actualizate in baza de date
     */
    public function datePersonale()
    {
        $validate = new Validate();
        $user = new User_model();

        if (isset($_POST["submit"])) {

            $validate->changeLastName($this->view->nume, $this->view->numeErr);
            $validate->changeFirstName($this->view->prenume, $this->view->prenumeErr);
            $validate->changeEmail($this->view->email, $this->view->emailErr);
            $validate->changeAddress($this->view->adresa, $this->view->adresaErr);
            $validate->changePhone($this->view->telefon, $this->view->telefonErr);
            $validate->changePassword($this->view->parola, $this->view->parolaErr);

            if (isset($this->view->nume) && $this->view->numeErr == "") $user->updateLastName($this->view->nume);
            if (isset($this->view->prenume) && $this->view->prenumeErr == "") $user->updateFirstName($this->view->prenume);
            if (isset($this->view->email) && $this->view->emailErr == "") {$user->updateEmail($this->view->email);}
            if (isset($this->view->adresa) && $this->view->adresaErr == "") $user->updateAddress($this->view->adresa);
            if (isset($this->view->telefon) && $this->view->telefonErr == "") $user->updatePhone($this->view->telefon);
            if (isset($this->view->parola) && $this->view->parolaErr == "") $user->updatePassword($this->view->parola);

            if ($this->view->numeErr == "" && $this->view->prenumeErr == "" && $this->view->emailErr == "" && $this->view->telefonErr == "" && $this->view->adresaErr == ""  && $this->view->parolaErr == "") {
                $this->view->success_message = "Datele au fost actualizate cu succes.";
            }
        }
        $this->view->render('datePersonaleAccount');
    }

    /**
     * selectez toate comenzile utilizatorului logat pentru a i le afisa
     */
    public function istoricComenzi()
    {
        $user = new User_model();
        $this->view->result = $user->selectComenziUtilizator();
        $this->view->render('istoricComenzi');
    }

    /**
     * selectez detaliile despre produsele achizitionate in comanda
     * cu id-ul dat ca parametru
     */
    public function detaliiComanda($order_id)
    {
        $user = new User_model();
        $this->view->title = $order_id;
        $this->view->totalPrice = $user->selectTotalPrice($order_id);
        $this->view->result = $user->selectDetaliiComanda($order_id);
        $this->view->render('detaliiComanda');
    }

    /**
     * distrug sesiunea creata pentru utilizatorul curent
     * astfel, delogand user-ul
     */
    public function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'login');
    }
}
