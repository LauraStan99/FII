<?php

class Register extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->view->numeErr = ""; 
    $prenumeErr = $emailErr = $telefonErr = $adresaErr = $parolaErr = "";
    $nume = $prenume = $email = $telefon = $adresa = $parola = "";
    $success_message = "";
    $user = new User();
    $valid = new Validate();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $valid->validateLastName($nume, $this->view->numeErr);
      $valid->validateFirstName($prenume, $prenumeErr);
      $valid->validateEmail($email, $emailErr);
      $valid->validateAdress($adresa, $adresaErr);
      $valid->validatePhone($telefon, $telefonErr);
      $valid->validatePassword($parola, $parolaErr);
    }

    if (isset($_POST["submit"])) {
      $insert_data = array(
        'nume' => $_POST["nume"], 'prenume' => $_POST["prenume"], 'email' => $_POST["email"],
        'telefon' => $_POST["telefon"], 'adresa' => $_POST["adresa"], 'parola' => $_POST["parola"]
      );
      if ($this->view->numeErr == "" && $prenumeErr == "" && $emailErr == "" && $telefonErr == "" && $adresaErr == ""  && $parolaErr == "") {
        if ($user->addUser($insert_data)) {
          $success_message = "Datele au fost introduse cu succes";
        }
      } else {
        $success_message = "Toate campurile campurile trebuie completate conform cerintelor.";
      }
    }

    /*$valid->export_message_register(
      $numeErr,
      $prenumeErr,
      $emailErr,
      $telefonErr,
      $adresaErr,
      $parolaErr,
      $nume,
      $prenume,
      $email,
      $telefon,
      $adresa,
      $parola,
      $success_message
    );*/
    $this->view->render('signIn');
  }
}
