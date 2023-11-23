<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Repository\CarsRepository;
use App\Repository\GaragesRepository;
use Twig\Extension\AbstractExtension;
use App\Twig\Runtime\FooterDataExtensionRuntime;

class CarsDataExtension extends AbstractExtension
{

    public function __construct(private CarsRepository $carsRepository, private GaragesRepository $garagesRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->garagesRepository = $garagesRepository;
    }


    // public function getFilters(): array
    // {
    //     return [
    //         // If your filter generates SAFE HTML, you should add a third
    //         // parameter: ['is_safe' => ['html']]
    //         // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
    //         new TwigFilter('filter_name', [FooterDataExtensionRuntime::class, 'doSomething']),
    //     ];
    // }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('carsData', [$this, 'getCarsData'])
        ];
    }



    public function getCarsData(): array
    {
        $garages = $this->garagesRepository->findAll();
        $cars = $this->carsRepository->findAll();

        return [
            'garages' => $garages,
            'cars' => $cars,
        ];
    }
}
