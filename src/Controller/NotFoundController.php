<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class NotFoundController
{
    /**
     * @return void
     */
    public function notFound()
    {
        View::render('notfound');
    }
}