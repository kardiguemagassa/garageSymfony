<?php

namespace App\Controller;

use App\Entity\Garages;
use App\Entity\Testimonials;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TestimonialsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestimonialsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    // Avis valide
    #[Route('/compte/avis', name: 'testimonials')]
    public function index(TestimonialsRepository $estimonialsRepository): Response
    {
        $testimonial = $estimonialsRepository->findByValidated(1);
        //dd($testimonial);

        return $this->render('testimonials/index.html.twig', [
            'avis' => $testimonial,
        ]);
    }


    //sauvegarde des avis
     #[Route('/avis/save', name: 'save_testimonial', methods:['POST'])]
    public function saveTestimonial(Request $request): Response
    {
        $note = $request->request->get('note');
        $author = $request->request->get('author');
        $message = $request->request->get('message');
        $garageId = $request->request->get('garage_id');
        $submittedToken = $request->request->get('token');

        // si le token n'est pas valide, retourner le message
        if (!$this->isCsrfTokenValid('save_testimonial', $submittedToken)){
            return new Response('Invalid CSRF token', Response::HTTP_FORBIDDEN);
        }

        // si ne pas une note numérique et que note est entre 1 ou 5, donc pas valide
        if (!is_numeric($note) || $note < 1 || $note > 5){
            return new Response('Invalid note value', Response::HTTP_BAD_REQUEST);
        }

        // si auteur ou le message est vide, ne peux pas etre envoyer
        if (empty($author) || empty($message)) {
            return new Response('Author and message are required', Response::HTTP_BAD_REQUEST);
        }

        $garage = $this->entityManager->getRepository(Garages::class)->find($garageId);

        // créer le message
        $testimonial = $this->createTestimonial($note, $author, $message, $garage);

        // envoyer en base 
        $this->entityManager->persist($testimonial);
        $this->entityManager->flush();

        return $this->redirectToRoute('avis');
    }

    // creation de avis
    private function createTestimonial(int $note, string $author, string $message, Garages $garage){
        $testimonial = new Testimonials();
        $testimonial
            ->setNote($note)
            ->setAuthor($author)
            ->setMessage($message)
            ->setGarages($garage);

        return $testimonial;
    } 
}
