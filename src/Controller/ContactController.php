<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class ContactController
{
    /**
     * @return bool
     */
    public function contact(): bool
    {
        View::render('contact');
        return true;
    }
}
