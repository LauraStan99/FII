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

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>