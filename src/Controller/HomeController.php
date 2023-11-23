<?php

namespace App\Controller;

// use App\classe\Mail;
use App\Entity\Cars;
use App\Entity\Header;
use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;

    }


    #[Route('/', name: 'home')]
    public function index(): Response
    {
        
        // $email = new Mail();
        // $email->send('magassakara@gmail.com','kara','Mon premier email',"Bonjour Kara j'espère que tu vas bien");
        $services = $this->entityManager->getRepository(Services::class)->findByisBest(1);
        $cars = $this->entityManager->getRepository(Cars::class)->findByisBest(1);
        $headers = $this->entityManager->getRepository(Header::class)->findAll();
        // $testimonial = $this->entityManager->getRepository(Testimonials::class)->findAll();
        //dd($testimonial);

        return $this->render('home/index.html.twig', [
            'services' => $services,
            'cars' => $cars,
            'headers' => $headers,
            // 'avis' => $testimonial
        ]);
    }
}
