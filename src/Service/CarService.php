<?php

namespace Sang\CarForRent\Service;

use Sang\CarForRent\Model\CarModel;
use Sang\CarForRent\Repository\CarRepository;
use Sang\CarForRent\Transformer\CarTransformer;

class CarService
{
    private CarRepository $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @param CarTransformer $carTransformer
     * @return CarModel|null
     */
    public function createCar(CarTransformer $carTransformer)
    {
        //check if it exist?
        $payload = [
            $carTransformer->getName(),
            $carTransformer->getImg(),
            $carTransformer->getColor(),
            $carTransformer->getBrand(),
            $carTransformer->getPrice()
        ];
        if (!$this->carRepository->insertCar($payload)) {
            return null;
        }

        //create
        $car = new CarModel();
        $car->setName($carTransformer->getName());
        $car->setImg($carTransformer->getImg());
        $car->setPrice($carTransformer->getPrice());
        $car->setImg($carTransformer->getImg());

        return $car;
    }

}