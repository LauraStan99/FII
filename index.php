<?php
$url = isset( $_GET['url']) ? $_GET['url'] : null;
$url = rtrim($url, '/');
$url = explode('/', $url);

print_r($url);

include 'lib/Controller.php';
include 'lib/View.php';
/*if(empty($url[0])){
    require 'controller/inregistrare-controller.php';
    $controller = new Validate();
    return false;
}*/

$file = 'controller/'.$url[0].'.php';

if(file_exists($file)){
    require $file;
}
/*
else
{
    require 'controllers/eroare.php';
    $controller = new Eroare();
    return false;
}
*/
$controller = new $url[0];
if (isset($url[2])) {
    $controller->{$url[1]}($url[2]);
} else {
    if (isset($url[1])) {
        $controller->{$url[1]}();
    }
}
?>