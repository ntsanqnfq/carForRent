<?php

namespace Sang\CarForRent\Repository;


use PDO;
use Sang\CarForRent\Model\CarModel;

class CarRepository extends AbstractRepository
{
    public function insertCar($tranferObject): bool
    {
        $query = $this->getConnection()->prepare("INSERT INTO car (name, description, img, color, brand, price) VALUES (?,?,?,?,?,?)");
        return $query->execute($tranferObject);
    }

    public function listCar()
    {
        $query = $this->getConnection()->prepare("SELECT * FROM car");
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!$row) {
            return [];
        }
        $carArray = [];
        foreach ($row as $key => $car) {
            $carData = new CarModel();
            $carData->setName($car['name']);
            $carData->setDescription($car['description']);
            $carData->setColor($car['color']);
            $carData->setBrand($car['brand']);
            $carData->setImg($car['img']);
            $carData->setPrice($car['price']);
            array_push($carArray, $carData);
        }
        return $carArray;
    }

}