<?php

session_start();
use Sang\CarForRent\App\Application;
use Sang\CarForRent\Http\Request;


error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/../vendor/autoload.php";

$application = new Application(new Request());

$application->start();
