<?php

class Account extends Controller{

    public function __construct(){
        parent:: __construct();
    }

    public function index(){

    $numeErr = $prenumeErr = $emailErr = $telefonErr = $adresaErr = $parolaErr = "";
    $nume = $prenume = $email = $telefon = $adresa = $parola = "";

     $validate=new Validate();

     $validate->validateLastName($nume,$numeErr);
     if($numeErr==null){
         //apelare metoda ChangeName
     }
     $validate->validateFirstName($prenume,$prenumeErr);
     if($prenumeErr==null){
        }
     $validate->validateEmail($email,$emailErr);   
     if($emailErr==null)
     {

     }
     $validate->validatePhone($telefon,$telefonErr);
     if($telefonErr==null){

     }
     $validate->validateAdress($adresa,$adresaErr);
     if($adresaErr==null)
     {

     }
     $validate->validatePassword($parola,$parolaErr);
     if($parolaErr==null){
         
     }
    }

}
?>