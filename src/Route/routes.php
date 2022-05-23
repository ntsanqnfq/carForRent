<?php
namespace Sang\CarForRent\Route;

use Sang\CarForRent\Bootstrap\Router;
use Sang\CarForRent\Controller\LoginController;
use Sang\CarForRent\Controller\SiteController;

Router::get('/', [new SiteController(), 'home']);
Router::get('/contact', [new SiteController(), 'contact']);
Router::post('/contact', [new SiteController(), 'handleContact']);

Router::get('/login', [new LoginController(), 'login']);
Router::post('/login', [new LoginController(), 'loginCheck']);
Router::get('/register', [new LoginController(), 'registerForm']);
Router::post('/register', [new LoginController(), 'register']);
Router::post('/logout', [new LoginController(), 'logout']);