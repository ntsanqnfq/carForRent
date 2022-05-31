<?php

namespace Sang\CarForRent\Repository;


class CarRepository extends AbstractRepository
{
    public function insertCar($tranferObject): bool
    {
        $query = $this->getConnection()->prepare("INSERT INTO car (name, img, color, brand, price) VALUES (?,?,?,?,?)");
        return $query->execute($tranferObject);
    }

}