<?php

use Sang\CarForRent\Bootstrap\Application;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Controller\SiteController;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));


$app->router->get('/', [new SiteController(), 'home']);
$app->router->get('/contact', [new SiteController(), 'contact']);
$app->router->post('/contact', [new SiteController(), 'handleContact']);
$app->router->get('/login', [new LoginController(), 'login']);
$app->router->post('/login', [new LoginController(), 'login']);


$app->run();

