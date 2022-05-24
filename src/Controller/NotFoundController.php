<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class NotFoundController
{
    public  function notFound(){
        View::render('notfound');
    }
}