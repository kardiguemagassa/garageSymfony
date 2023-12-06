<?php


namespace App\Classe;

// use App\Entity\Brand;
// use App\Entity\Models;


class Search {
    // créer un formulaire lié à cette classes

    // recherche texte de l'utilisateur

    // /**
    //  * @var string
    //  */
    // public $string = "";

    // /**
    //  * @var Brand[]
    //  */
    // public $brand = [];

    //  /**
    //  * @var Models[]
    //  */
    // public $models= [];

    public ?float $minPrice = null;

    public ?float $maxPrice = null;

    public  ?string $minKilometer = null;

    public  ?string $maxKilometer = null;

    public  ?int $minYear = null;

    public  ?int $maxYear = null;

    public  ?string $brand = null;

    public  ?string $energy = null;
}