<?php

class Validate
{

  public function __construct()
  {
  }


  function validateLastName(&$nume, &$numeErr)
  {
    if (empty($_POST["nume"])) {
      $numeErr = 'Numele este obligatoriu';
    } else {
      $nume = $this->test_input($_POST["nume"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $nume)) {
        $numeErr = 'Obligatoriu doar litere si spatii';
      }
    }
  }

  function validateFirstName(&$prenume, &$prenumeErr)
  {
    if (empty($_POST["prenume"])) {
      $prenumeErr = "Prenumele este obligatoriu";
    } else {

      $prenume = $this->test_input($_POST["prenume"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $prenume)) {
        $prenumeErr = "Obligatoriu doar litere si spatii";
      }
    }
  }

  function validateEmail(&$email, &$emailErr)
  {
    if (empty($_POST["email"])) {
      $emailErr = "Email-ul este obligatoriu";
    } else {

      $email = $this->test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format gresit";
      }
    }
  }

  function validateAdress(&$adresa, &$adresaErr)
  {
    if (empty($_POST["adresa"])) {
      $adresaErr = "Adresa este obligatorie";
    } else {
      $adresa = $this->test_input($_POST["adresa"]);
    }
  }
  function validateCity(&$oras, &$orasErr)
  {
    if (empty($_POST["oras"])) {
      $orasErr = "Orasul este obligatoriu";
    } else {

      $oras = $this->test_input($_POST["oras"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $oras)) {
        $orasErr = "Obligatoriu doar litere si spatii";
      }
    }
  }
  function validateCountry(&$tara, &$taraErr)
  {
    if (empty($_POST["tara"])) {
      $taraErr = "Tara este obligatorie";
    } else {

      $tara = $this->test_input($_POST["tara"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $tara)) {
        $taraErr = "Obligatoriu doar litere si spatii";
      }
    }
  }

  function validatePhone(&$telefon, &$telefonErr)
  {
    if (empty($_POST["telefon"])) {
      $telefonErr = "Numarul de telefon este obligatoriu";
    } else {

      $telefon = $this->test_input($_POST["telefon"]);

      if (!preg_match("/^[0-9]*$/", $telefon)) {
        $telefonErr = "Obligatoriu doar numere";
      }
    }
  }

  function validatePassword(&$parola, &$parolaErr)
  {
    if (empty($_POST["parola"])) {
      $parolaErr = "Parola este obligatorie";
    } else {
      $parola = $this->test_input($_POST["parola"]);

      if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $parola)) {
        $parolaErr = "Obligatoriu minim cate una din: numere, litere si caractere speciale";
      }
    }
  }

  function validateMessage(&$mesaj, &$mesajErr)
  {
    if (empty($_POST["mesaj"])) {
      $mesajErr = "Mesajul este obligatoriu";
    } else {
      $mesaj = $this->test_input($_POST["mesaj"]);
    }
  }
  function changeLastName(&$nume, &$numeErr)
  {
    if (!empty($_POST["nume"])) {
      $nume = $this->test_input($_POST["nume"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $nume)) {
        $numeErr = 'Obligatoriu doar litere si spatii';
      }
    }
  }

  function changeFirstName(&$prenume, &$prenumeErr)
  {
    if (!empty($_POST["prenume"])) {
      $prenume = $this->test_input($_POST["prenume"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $prenume)) {
        $prenumeErr = "Obligatoriu doar litere si spatii";
      }
    }
  }

  function changeEmail(&$email, &$emailErr)
  {
    if (!empty($_POST["email"])) {
      $email = $this->test_input($_POST["email"]);
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format gresit";
      }
    }
  }

  function changeAdress(&$adresa, &$adresaErr)
  {
    if (!empty($_POST["adresa"])) {
      $adresa = $this->test_input($_POST["adresa"]);
    }
  }

  function changePhone(&$telefon, &$telefonErr)
  {
    if (!empty($_POST["telefon"])) {
      $telefon = $this->test_input($_POST["telefon"]);

      if (!preg_match("/^[0-9]*$/", $telefon)) {
        $telefonErr = "Obligatoriu doar numere";
      }
    }
  }

  function changePassword(&$parola, &$parolaErr)
  {
    if (!empty($_POST["parola"])) {
      $parola = $this->test_input($_POST["parola"]);
      if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $parola)) {
        $parolaErr = "Obligatoriu minim cate una din: numere, litere si caractere speciale";
      }
    }
  }
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function export_message_register(
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
  ) {
    $messages = array(
      1 => $numeErr, 2 => $prenumeErr, 3 => $emailErr, 4 => $telefonErr,
      5 => $adresaErr, 6 => $parolaErr,  7 => $nume, 8 => $prenume, 9 => $email, 10 => $telefon,
      11 => $adresa, 12 => $parola, 13 => $success_message
    );
    extract($messages);
  }
}
