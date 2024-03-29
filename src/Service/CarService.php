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
    public function createCar(CarTransformer $carTransformer): ?CarModel
    {
        //check if it exist?
        $payload = [
            $carTransformer->getName(),
            $carTransformer->getDescription(),
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
        $car->setDescription($carTransformer->getDescription());
        $car->setImg($carTransformer->getImg());
        $car->setPrice($carTransformer->getPrice());
        $car->setImg($carTransformer->getImg());

        return $car;
    }

    /**
     * @return int
     */
    public function countCar(): int
    {
        return sizeof($this->carRepository->listCar());
    }

    /**
     * @return array
     */
    public function listCar(): array
    {
        return $this->carRepository->listCar();
    }

}