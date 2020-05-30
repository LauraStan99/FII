<?php
require 'config.php';
 spl_autoload_register(function ($class) {
	require LIBS . $class .".php";
});
require 'models/user.php';
require 'models/butoane_model.php';

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
require_once "PHPMailer/SMTP.php";
$bootstrap = new Bootstrap();
$bootstrap->init();

$country = array ('Romania'=>'Romania','Italia'=>'Italy','Germania'=>'Germany','Spania'=>'Spain','Rusia'=>'Russia', 'Anglia' => 'England',
'Portugalia' => 'Portugal', 'Grecia' => 'Greece', 'Austria' => 'Austria', 'Franta' => 'France', 'Norvegia' => 'Norway', 'Moldova' => 'Moldova');
file_put_contents("libs/array.json",json_encode($country));