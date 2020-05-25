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
