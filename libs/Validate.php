<?php

class Validate
{

  public function __construct()
  {
  }

  /**
   * validare nume de familie in formular
   * numele trebuie sa contina doar litere sau si spatii
   */
  function validateLastName(&$lastName, &$lastNameErr)
  {
    if (empty($_POST["nume"])) {
      $lastNameErr = 'Numele este obligatoriu';
    } else {
      $lastName = $this->test_input($_POST["nume"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
        $lastNameErr = 'Obligatoriu doar litere sau si spatii';
      }
    }
  }

  /**
   * validare prenume in formular
   * prenumele trebuie sa contina doar litere sau si spatii
   * 
   */
  function validateFirstName(&$firstName, &$firstNameErr)
  {
    if (empty($_POST["prenume"])) {
      $firstNameErr = "Prenumele este obligatoriu";
    } else {
      $firstName = $this->test_input($_POST["prenume"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
        $firstNameErr = "Obligatoriu doar litere sau si spatii";
      }
    }
  }

  /**
   * validare email in formular
   * email-ul trebuie sa aiba formatul standard al unui email example@site.com
   */
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


  /**
   * validare adresa in formular
   * adresa trebuie sa fie mentionata
   * nu are nicio constrangere privind caracterele din aceasta
   */
  function validateAddress(&$adress, &$adressErr)
  {
    if (empty($_POST["adresa"])) {
      $adressErr = "Adresa este obligatorie";
    } else {
      $adress = $this->test_input($_POST["adresa"]);
    }
  }

  /**
   * validare oras formular
   * numele orasului trebuie sa contina doar litere sau si spatii
   */
  function validateCity(&$city, &$cityErr)
  {
    if (empty($_POST["oras"])) {
      $cityErr = "Orasul este obligatoriu";
    } else {
      $city = $this->test_input($_POST["oras"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $cityErr = "Obligatoriu doar litere sau si spatii";
      }
    }
  }

  /**
   * validare tara
   * numele tarii trebuie sa contina doar litere sau si spatii
   */
  function validateCountry(&$country, &$countryErr)
  {
    if (empty($_POST["tara"])) {
      $countryErr = "Tara este obligatorie";
    } else {

      $country = $this->test_input($_POST["tara"]);

      if (!preg_match("/^[a-zA-Z ]*$/", $country)) {
        $countryErr = "Obligatoriu doar litere sau si spatii";
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

  function validatePayment(&$plata, &$plataErr)
  {
    if (empty($_POST["plata"])) {
      $plataErr = "Plata este obligatorie";
    } else {
      $plata = $this->test_input($_POST["plata"]);
    }
  }

  function validateDelivery(&$livrare, &$livrareErr)
  {
    if (empty($_POST["livrare"])) {
      $livrareErr = "Metoda de livrare este obligatorie";
    } else {
      $livrare = $this->test_input($_POST["livrare"]);
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

  function changeAddress(&$adresa, &$adresaErr)
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

  function validateNameCard(&$numeCard, &$numeCardErr)
  {
    if (empty($_POST["nume-card"])) {
      $numeCardErr = 'Numele este obligatoriu';
    } else {
      $numeCard = $_POST["nume-card"];

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
        if (checkdate('01', '1', $anCard) != 1 || strlen($anCard) != 4 || $anCard < 2020) {
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

  function validatePrice(&$price, &$priceErr)
  {
    if (empty($_POST["pret"])) {
      $priceErr = "Pretul produsului este obligatoriu.";
    } else {
      $price = str_replace(' ', '', $_POST["pret"]);
      if (!preg_match("/^[0-9 ]*$/", $price)) {
        $priceErr = "Pretul trebuie sa contina doar cifre.";
      }
    }
  }
  function validateEmptyInput($nameInput, &$inputErr, &$inputValue)
  {
    if (empty($nameInput)) {
      $inputErr = "Acest camp este obligatoriu.";
    } else {
      $inputValue = $nameInput;
    }
  }
}
