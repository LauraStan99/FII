<?php
require 'config.php';
 spl_autoload_register(function ($class) {
	require LIBS . $class .".php";
});
require 'models/user.php';
$bootstrap = new Bootstrap();
$bootstrap->init();
?>