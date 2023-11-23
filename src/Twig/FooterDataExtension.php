<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Repository\GaragesRepository;
use Twig\Extension\AbstractExtension;
use App\Repository\SchedulesRepository;
use App\Twig\Runtime\FooterDataExtensionRuntime;

class FooterDataExtension extends AbstractExtension
{

    public function __construct(private SchedulesRepository $schedulesRepository, private GaragesRepository $garagesRepository)
    {
        $this->schedulesRepository = $schedulesRepository;
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
            new TwigFunction('footerData', [$this, 'getFooterData'])
        ];
    }



    public function getFooterData(): array
    {
        $garages = $this->garagesRepository->findAll();
        $schedules = $this->schedulesRepository->findAll();

        return [
            'garages' => $garages,
            'schedules' => $schedules,
        ];
    }
}
