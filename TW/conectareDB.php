<?php

$message='Connected to database';

$db = new mysqli('localhost', 'user', '1234', 'proiect');

if($db->connect_error){
    $message = $db->connect_error;
}
else{
    echo $message;
}
?>


