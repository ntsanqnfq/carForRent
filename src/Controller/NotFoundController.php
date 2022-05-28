<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;
use Sang\CarForRent\Http\Response;

class NotFoundController extends BaseController
{
    public const INDEX_ACTION = 'index';

    /**
     * @return Response
     */
    public function index(): Response
    {
        View::redirect('notfound');
    }
}
