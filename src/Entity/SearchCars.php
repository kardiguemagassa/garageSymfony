<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;


class SearchCars {

    // private $minPrice;
    // private $maxPrice;
    // private $minKilometer;
    // private $maxKilometer;
    // private $minYear;
    // private $maxYear;
    // private $brand;
    // private $energy;

    private ?float $minPrice = null;
    private ?float $maxPrice = null;
    private ?string $minKilometer = null;
    private ?string $maxKilometer = null;
    private ?int $minYear = null;
    private ?int $maxYear = null;
    private ?string $brand = null;
    private ?string $energy = null;


    public function getMinPrice()
    {
        return $this->minPrice;
    }

    public function setMinPrice($minPrice): self
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    public function setMaxPrice($maxPrice): self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function getMinKilometer()
    {
        return $this->minKilometer;
    }

    public function setMinKilometer($minKilometer): self
    {
        $this->minKilometer = $minKilometer;

        return $this;
    }

    public function getMaxKilometer()
    {
        return $this->maxKilometer;
    }

    public function setMaxKilometer($maxKilometer): self
    {
        $this->maxKilometer = $maxKilometer;

        return $this;
    }

    public function getMinYear()
    {
        return $this->minYear;
    }

    public function setMinYear($minYear): self
    {
        $this->minYear = $minYear;

        return $this;
    }

    public function getMaxYear()
    {
        return $this->maxYear;
    }

    public function setMaxYear($maxYear): self
    {
        $this->maxYear = $maxYear;

        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getEnergy()
    {
        return $this->energy;
    }

    public function setEnergy($energy): self
    {
        $this->energy = $energy;

        return $this;
    }
}

