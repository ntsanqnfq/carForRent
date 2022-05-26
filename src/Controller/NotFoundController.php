<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;

class NotFoundController
{
    /**
     * @runInSeparateProcess
     * @return bool
     */
    public function notFound(): bool
    {
        View::render('notfound');
        return true;
    }
}
