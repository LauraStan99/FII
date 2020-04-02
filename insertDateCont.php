<?php

$message='Connected to database';

$db = new mysqli('localhost', 'user', '1234', 'proiect');

if($db->connect_error){
    $message = $db->connect_error;
}
else{
    echo $message;}

    $Nume=$_POST['nume'];
    $Prenume=$_POST['prenume'];
    $Email=$_POST['email'];
    $Parola=$_POST['parola'];

    $sql="INSERT INTO utilizatori (Nume,Prenume,Email,Parola) VALUES ($Nume,$Prenume,$Email,$Parola)";

    if(!mysqli_query($db,$sql))
    {
       echo'nu a fost inserat';
    }
    else
    {
        echo'a fost inserat cu succes';
    } 

    header("refresh:2; url=Inregistrare.html");
?>