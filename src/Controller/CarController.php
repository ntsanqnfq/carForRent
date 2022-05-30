<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;

class CarController extends BaseController
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);

    }

    public function addCarIndex(): Response
    {
        $view = 'addCarForm';
        return $this->response->view($view);
    }

    public function addCar()
    {
        $params = $this->request->getFormParams();
        $carImg = $this->request->getFiles()['img'];

        $params = [
            ...$params,
             "img" => $carImg["name"]
        ];
    }
}
