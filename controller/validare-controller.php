<?php
include '../model/comenzi-model.php'; 
class Controller extends Database{
    
    function validateLastName(&$nume, &$numeErr)
    {
        if (empty($_POST["nume"]))
        {
            $numeErr = 'Numele este obligatoriu';
        } 
        else
        {
            $controller = new Controller();
            $nume=$controller->test_input($_POST["nume"]);
        
            if (!preg_match("/^[a-zA-Z ]*$/",$nume))
            {
              $numeErr='Obligatoriu doar litere si spatii';
            }
        }
    }

    function validateFirstName( &$prenume, &$prenumeErr)
    {
        if (empty($_POST["prenume"])) {
            $prenumeErr = "Prenumele este obligatoriu";
          } else {
              $controller = new Controller();
              $prenume=$controller->test_input($_POST["prenume"]);
        
            if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
              $prenumeErr="Obligatoriu doar litere si spatii";
            }
          }
    }

    function validateEmail(&$email, &$emailErr)
    {
      if (empty($_POST["email"])) {
        $emailErr = "Email-ul este obligatoriu";
      } else {
        $controller = new Controller();
        $email=$controller->test_input($_POST["email"]);
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
        $controller = new Controller();
        $email=$controller->test_input($_POST["adresa"]);
      }
    }

    function validatePhone(&$telefon, &$telefonErr){
      if (empty($_POST["telefon"])) {
        $telefonErr = "Numarul de telefon este obligatoriu";
      } else {
        
        $controller = new Controller();
        $telefon=$controller->test_input($_POST["telefon"]);
    
        if (!preg_match("/^[0-9]*$/",$telefon)) {
          $telefonErr="Obligatoriu doar numere";
        }
      }
    }

    function validatePassword(&$parola, &$parolaErr){
      if (empty($_POST["parola"])) {
        $parolaErr = "Parola este obligatorie";
      } else {

        $controller = new Controller();
        $parola=$controller->test_input($_POST["parola"]);
    
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$parola)) {
          $parolaErr="Obligatoriu minim cate una din: numere, litere si caractere speciale";
        }
      }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>