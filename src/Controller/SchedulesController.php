<?php

namespace App\Controller;

use App\Entity\Schedules;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SchedulesController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/horaires', name: 'schedules')]
    public function index(): Response
    {
        $schedules = $this->entityManager->getRepository(Schedules::class)->findAll();
        //dd($schedules);

        return $this->render('schedules/index.html.twig', [
            'schedules' => $schedules,
        ]);
    }
}
