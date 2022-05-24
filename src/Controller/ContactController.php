<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class ContactController
{
    /**
     * @return void
     */
    public function contact(){
        View::render('contact');
    }
}
