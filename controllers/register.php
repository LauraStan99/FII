<?php

class Register extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $user = new User();
    $valid = new Validate();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $valid->validateLastName($this->view->nume, $this->view->numeErr);
      $valid->validateFirstName($this->view->prenume, $this->view->prenumeErr);
      $valid->validateEmail($this->view->email, $this->view->emailErr);
      $valid->validateAddress($this->view->adresa, $this->view->adresaErr);
      $valid->validatePhone($this->view->telefon, $this->view->telefonErr);
      $valid->validatePassword($this->view->parola, $this->view->parolaErr);
    }

    

    if (isset($_POST["submit"])) {
      $insert_data = array(
        'nume' => $_POST["nume"], 'prenume' => $_POST["prenume"], 'email' => $_POST["email"],
        'telefon' => $_POST["telefon"], 'adresa' => $_POST["adresa"], 'parola' =>Hash::create('sha256',$_POST['parola'], HASH_PASSWORD_KEY) 

      );
      if ($this->view->numeErr == "" && $this->view->prenumeErr == "" && $this->view->emailErr == "" && $this->view->telefonErr == "" && $this->view->adresaErr == ""  && $this->view->parolaErr == "") {
        if ($user->addUser($insert_data)) {
          $this->view->success_message = "Datele au fost introduse cu succes";
        }
      } else {
        $this->view->success_message = "Toate campurile campurile trebuie completate conform cerintelor.";
      }
    }
    $this->view->render('signIn');
  }
}
