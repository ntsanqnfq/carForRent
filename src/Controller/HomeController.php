<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class HomeController
{
    public function home(): void
    {
        View::render('home');
    }
}