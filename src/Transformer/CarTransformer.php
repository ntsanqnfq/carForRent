<?php

namespace Sang\CarForRent\Transformer;


class CarTransformer implements TransformerInterface
{

    private ?string $name;
    private ?string $img;
    private ?string $color;
    private ?string $brand;
    private ?int $price;

    public function formArray(array $params): TransformerInterface
    {
        $this->name = $params['name'] ?? null;
        $this->img = $params['img'] ?? null;
        $this->color = $params['color'] ?? null;
        $this->brand = $params['brand'] ?? null;
        $this->price = $params['price'] ?? null;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * @param string|null $img
     */
    public function setImg(?string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string|null $brand
     */
    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }



}