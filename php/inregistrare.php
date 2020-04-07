<?php
$numeErr =$prenumeErr= $emailErr = $adresaErr = $telefonErr = $parolaErr = "";

if(empty($_REQUEST["nume"])){
  $numeErr = "Numele este necesar";
}

if(empty($_REQUEST["prenume"])){
  $prenumeErr = "Prenumele este necesar";
}

if(empty($_REQUEST["email"])){
  $emailErr = "Email-ul este necesar";
}

if(empty($_REQUEST["adresa"])){
  $adresaErr = "Adresa este necesar";
}

if(empty($_REQUEST["telefon"])){
  $telefonErr = "Telefon este necesar";
}

if(empty($_REQUEST["parola"])){
  $parolaErr = "Parola este necesar";
}


$db = new mysqli('localhost:3308', 'user', '1234', 'impressed');

if($db->connect_error){
    $message = $db->connect_error;
}
else{

    $sql=$db->prepare("insert into utilizatori (nume,prenume,email,telefon,adresa,parola)
                        values (?,?,?,?,?,?)");

    if($_REQUEST["nume"]==null ||$_REQUEST["prenume"]==null||$_REQUEST["email"]==null||
       $_REQUEST["telefon"]==null||$_REQUEST["adresa"]==null||$_REQUEST["parola"]==null)
       {
        // echo" nu au fost completate toate sectiunile";
       }
       else{
        
            $sql->bind_param("ssssss",$_REQUEST["nume"],$_REQUEST["prenume"],$_REQUEST["email"],
                          $_REQUEST["telefon"],$_REQUEST["adresa"],$_REQUEST["parola"]);
            $sql->execute();
            $db->close();}
       }
       
    
?>