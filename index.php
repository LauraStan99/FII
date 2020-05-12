<?php
require 'config.php';
 spl_autoload_register(function ($class) {
	require LIBS . $class .".php";
});
require 'models/user.php';
require 'models/butoane_model.php';
require 'models/wishlist_model.php';
$bootstrap = new Bootstrap();
$bootstrap->init();
