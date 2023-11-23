<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Repository\GaragesRepository;
use Twig\Extension\AbstractExtension;
use App\Repository\TestimonialsRepository;
use App\Twig\Runtime\FooterDataExtensionRuntime;

class TestimonialsDataExtension extends AbstractExtension
{

    public function __construct(private TestimonialsRepository $testimonialsRepository, private GaragesRepository $garagesRepository)
    {
        $this->testimonialsRepository = $testimonialsRepository;
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
            new TwigFunction('testimonialsData', [$this, 'getTestimonialsData'])
        ];
    }



    public function getTestimonialsData(): array
    {
        $garages = $this->garagesRepository->findAll();
        $testimonials = $this->testimonialsRepository->findAll();

        return [
            'garages' => $garages,
            'testimonials' => $testimonials,
        ];
    }
}
