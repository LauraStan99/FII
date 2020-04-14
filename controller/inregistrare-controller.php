<?php
include '../model/inregistrare-model.php'; 
class Controller extends Database{
    
    function validateLastName($name, &$nume, &$numeErr)
    {
        if (empty($name))
        {
            $numeErr = 'Numele este obligatoriu';
        } 
        else
        {
            $nume = test_input($name);
        
            if (!preg_match("/^[a-zA-Z ]*$/",$nume))
            {
              $numeErr='Obligatoriu doar litere si spatii';
            }
        }
    }

    function validateFirstName($name, &$prenume, &$prenumeErr)
    {
        if (empty($name)) {
            $prenumeErr = "Prenumele este obligatoriu";
          } else {
            $prenume = test_input($name);
        
            if (!preg_match("/^[a-zA-Z ]*$/",$prenume)) {
              $prenumeErr="Obligatoriu doar litere si spatii";
            }
          }
    }

    function validateEmail($e, &$email, &$emailErr)
    {
      if (empty($e)) {
        $emailErr = "Email-ul este obligatoriu";
      } else {
        $email = test_input($e);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Format gresit";
        }
      }
    }

    function validateAdress($adress, &$adresa, &$adresaErr)
    {
      if (empty($adress)) {
        $adresaErr = "Adresa este obligatorie";
      } else {
        $adresa = test_input($adress);
      }
    }

    function validatePhone($phone, &$telefon, &$telefonErr){
      if (empty($phone)) {
        $telefonErr = "Numarul de telefon este obligatoriu";
      } else {
        $telefon = test_input($phone);
    
        if (!preg_match("/^[0-9]*$/",$telefon)) {
          $telefonErr="Obligatoriu doar numere";
        }
      }
    }

    function validatePassword($password, &$parola, &$parolaErr){
      if (empty($password)) {
        $parolaErr = "Parola este obligatorie";
      } else {
        $parola = test_input($password);
    
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