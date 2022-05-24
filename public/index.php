<?php

session_start();
use Sang\CarForRent\App\Application;


error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/../vendor/autoload.php";

$application = new Application();

$application->start();
