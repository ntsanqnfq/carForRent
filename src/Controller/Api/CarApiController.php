<?php

namespace Sang\CarForRent\Controller\Api;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Model\CarModel;
use Sang\CarForRent\Transformer\CarTransformer;

class CarApiController extends AbstractApiController
{
    private CarTransformer $carTransformer;
    public function __construct(Request $request, Response $response, CarTransformer $carTransformer)
    {
        parent::__construct($request, $response);
        $this->carTransformer = $carTransformer;
    }


    /**
     * @return Response
     */
    public function listCars(): Response
    {
        $cars = [
            new CarModel(),
            new CarModel()
        ];
        $results = [];
        foreach ($cars as $car){
            $results[] = $this->carTransformer->transform($car);
        }
        return ($this->response->success($results));
    }

    public function getCar(int $id): ?CarModel
    {
        return new CarModel();
    }

    public function addCar($data): CarModel
    {
        $params = $this->request->getFormParams();
        $carImg = $this->request->getFiles()['img'];

        return new CarModel();
    }

    public function putCar($id, $data): CarModel
    {
        return new CarModel();
    }

    public function deleteCar($id): bool
    {
        return true;
    }
}
