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

  function validateNumeCard(&$numeCard, &$numeCardErr)
  {
    if (empty($_POST["numeCard"])) {
      $numeCardErr = 'Numele este obligatoriu';
    } else {
      $numeCard = $this->test_input($_POST["numeCard"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $numeCard)) {
        $numeCardErr = "Obligatoriu doar litere si spatii";
      }
    }
  }
  function validateNumarCard(&$numarCard, &$numarCardErr)
  {
    if (empty($_POST["numar-card"])) {
      $numarCardErr = 'Numarul este obligatoriu';
    } else {
      $numarCard = $_POST['numar-card'];

      if (!preg_match("/^[0-9 ]*$/", $numarCard) || strlen(str_replace(' ', '', $_POST["numar-card"])) != 16) {
        $numarCardErr = "Obligatoriu doar numere si spatii";
      }
    }
  }
  function validateMonthCard(&$lunaCard, &$lunaCardErr)
  {
    if (empty($_POST["luna-card"])) {
      $lunaCardErr = 'Luna este obligatorie';
    } else {

      $lunaCard = str_replace(' ', '', $_POST["luna-card"]);
      if (preg_match("/^[0-9]*$/", $lunaCard)) {
        if (checkdate($lunaCard, '1', '2000') != 1) {
          $lunaCardErr = "Luna invalida";
        }
      } else {
        $lunaCardErr = "Obligatoriu doar numere";
      }
    }
  }
  function validateYearCard(&$anCard, &$anCardErr)
  {
    if (empty($_POST["an-card"])) {
      $anCardErr = 'Anul este obligatoriu';
    } else {

      $anCard = str_replace(' ', '', $_POST["an-card"]);
      if (preg_match("/^[0-9]*$/", $anCard)) {
        if (checkdate('01', '1', $anCard) != 1 || strlen($anCard) != 4) {
          $anCardErr = "Anul este invalid";
        }
      } else {
        $anCardErr = "Obligatoriu doar numere";
      }
    }
  }
  function validateCvvCard(&$cvvCard, &$cvvCardErr)
  {
    if (empty($_POST["CVV-card"])) {
      $cvvCardErr = 'Codul cvv este obligatoriu';
    } else {

      $cvvCard = str_replace(' ', '', $_POST["CVV-card"]);
      if (!preg_match("/^[0-9]*$/", $cvvCard) || strlen($cvvCard) != 3) {
        $cvvCardErr = "Codul cvv este invalid";
      }
    }
  }
}
