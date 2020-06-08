<?php
header ('Content-type: text/xml');
define ('DOCXML', 'utilizatori.xml');
$email_user=$_GET['email'];
   
     $mesaj="";
    if (!($xml = simplexml_load_file (DOCXML))) {
           return 0;
          }
    if ($email_user !== "") {
        $email_user = strtolower($email_user);
        $len=strlen($email_user);
        foreach ($xml->xpath('/users/user/email') as $email) {
            if (!strcasecmp($email_user,strtolower($email))) {
               $mesaj="Email-ul introdus este deja utilizat. Introduceti altul!";
            }
        }
    }

echo $mesaj === "" ? "" : $mesaj;
