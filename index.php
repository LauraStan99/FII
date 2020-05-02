<?php
require 'libs/Controller.php';
require 'libs/Router.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Validate.php';
require 'models/user.php';
require 'libs/Session.php';
require 'libs/Hash.php';
define('URL', 'http://localhost/FII/');
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
$router = new Router();
$router->init();
