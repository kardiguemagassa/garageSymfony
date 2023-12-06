<?php

namespace App\Controller;

use App\Form\ContactType;

use Symfony\Component\Mime\Email;
use App\Service\SendMailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    #[Route('/compte/nous-contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        //$mail = new SendMailerService();
        $form = $this->createForm(ContactType::class);

        $contact = $form->handleRequest($request);

        

        if($form->isSubmitted()&& $form->isValid()){
            //$this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');

            //dd($form->getData());
            $firstName = $request->request->get('firstName');
            $lastName = $request->request->get('lastName');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

             $email = (new Email())
            ->from($email)
            ->to('magassakara@gmail.com')
            ->subject("Demande d'information")
            //->text('Sending emails is fun again!')
            ->html('<p>Bonjour vous avez un message de' .$firstName. ' "" '.$lastName .',<br> dont voici le message '.$message.'. !</p>');

        $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');
        } elseif ($form->isSubmitted()) {
            $this->addFlash('error', "Une erreur s'est produite. Veuillez réesayer.");
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
