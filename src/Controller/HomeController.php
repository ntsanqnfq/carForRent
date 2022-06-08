<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;

class HomeController extends BaseController
{
    private CarService $carService;

    public function __construct(Request $request, Response $response, CarService $carService)
    {
        parent::__construct($request, $response);
        $this->carService = $carService;
    }

    public function index(): Response
    {
        $carList = $this->carService->listCar();
        $countCar = $this->carService->countCar();
        return $this->response->view('home', ['list' => $carList,
            'count' => $countCar
        ]);
    }
}
