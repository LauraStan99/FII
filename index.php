<?php
require 'libs/Controller.php';
require 'libs/Router.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Validate.php';
require 'models/user.php';

$router = new Router();
$router->init();
