<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class HomeController
{
    /**
     * @return bool
     */
    public function home(): bool
    {
        View::render('home');
        return true;
    }
}
