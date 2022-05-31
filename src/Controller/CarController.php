<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;
use Sang\CarForRent\Transformer\CarTransformer;
use Sang\CarForRent\Validation\CarValidation;

class CarController extends BaseController
{
    private CarValidation $carValidation;
    private CarService $carService;
    public function __construct(Request $request, Response $response, CarValidation $carValidation, CarService $carService)
    {
        parent::__construct($request, $response);
        $this->carValidation = $carValidation;
        $this->carService = $carService;
    }

    public function addCar(): Response
    {
        if($this->request->isPost()) {
            //get data
            $params = $this->request->getFormParams();
            $carImg = $this->request->getFiles()['img'];
            $params = [
                ...$params,
                "img" => $carImg["name"]
            ];

            //tranfer
            $carTransformer = new CarTransformer();
            $carTransformer->formArray($params);

            //validate
            $this->carValidation->loadData($params);
            if (!$this->carValidation->validate()) {
                return $this->response->view('addCarForm', ['errors' => $this->carValidation]);
            }

            //add to database
            $car = $this->carService->createCar($carTransformer);

            if($carImg["name"]){
//                $errorUpload =
            }

            return $this->response->view('home');
        }
        return $this->response->view('addCarForm', ['errors' => $this->carValidation]);
    }
}
