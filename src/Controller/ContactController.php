<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class ContactController
{
    public function contact(){
        View::render('contact');
    }
}
