<?php

namespace App\Controller;

use App\Entity\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    #[Route('/compte/nos-services', name: 'services')]
    public function index(Request $request): Response
    {

        $services = $this->entityManager->getRepository(Services::class)->findAll();
        //dd($services);

        return $this->render('services/index.html.twig', [
            'services' => $services,
        ]);
    }


    #[Route('/service/{slug}', name: 'service')]
    public function show($slug): Response{

        //affichage de slug
        $service = $this->entityManager->getRepository(Services::class)->findOneBySlug($slug);
        $services = $this->entityManager->getRepository(Services::class)->findByisBest(1);
        //dd($servics);
        if(!$service){
            return $this->redirectToRoute('services');
        }

        return $this->render('services/show.html.twig', [
            'service' => $service,
            'services' => $services,
        ]);
    }


}
