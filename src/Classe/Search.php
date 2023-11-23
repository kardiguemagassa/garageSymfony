<?php


namespace App\Classe;

use App\Entity\Brand;
use App\Entity\Models;


class Search {
    // créer un formulaire lié à cette classes

    // recherche texte de l'utilisateur
    /**
     * @var string
     */
    public $string = "";

    /**
     * @var Brand[]
     */
    public $brand = [];

     /**
     * @var Models[]
     */
    public $models= [];


    public ?float $priceMin = null;

    public ?float $priceMax = null;

    public  ?string $kilometersMin = null;

    public  ?string $kilometersMax = null;

    public  ?int $yearMin = null;

    public  ?int $yearMax = null;

    //public  ?string $brand = null;

    public  ?string $energy = null;

   
}