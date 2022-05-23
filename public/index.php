<?php

use Sang\CarForRent\Bootstrap\Application;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Controller\SiteController;
use Sang\CarForRent\Database\Database;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$conn = Database::getConnection();
$application = new Application(dirname(__DIR__));
include "../src/Route/routes.php";



$app->run();

