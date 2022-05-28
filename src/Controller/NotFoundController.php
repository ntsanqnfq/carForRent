<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\App\View;
use Sang\CarForRent\Http\Response;

class NotFoundController extends BaseController
{
    public const INDEX_ACTION = 'notFound';

    /**
     * @return Response
     */
    public function notFound(): Response
    {
        $view = "notfound";
        return $this->response->view($view, [], Response::HTTP_NOT_FOUND);
    }
}
