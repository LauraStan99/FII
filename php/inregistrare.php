<?php

$db = new mysqli('localhost:3308', 'user', '1234', 'impressed');

if($db->connect_error){
    $message = $db->connect_error;
}
else{ echo"succes";

    $sql=$db->prepare("insert into utilizatori (nume,prenume,email,telefon,adresa,parola)
                        values (?,?,?,?,?,?)");
    $sql->bind_param("ssssss",$_REQUEST["nume"],$_REQUEST["prenume"],$_REQUEST["email"],
                          $_REQUEST["telefon"],$_REQUEST["adresa"],$_REQUEST["parola"]);
    $sql->execute();

    
    $db->close();}
?>