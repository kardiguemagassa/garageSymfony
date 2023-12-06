<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager =$entityManager;
    }
    
    #[Route('/inscription', name: 'register')]
    public function index(Request $request, UserPasswordHasherInterface $hashPassword): Response
    {

        $user = new User();
        $form=$this->createForm(RegisterType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $user =$form->getData();

            $passwordCrypte = $hashPassword->hashPassword($user,$user->getPassword());

            $user->setPassword($passwordCrypte);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
           
            $this->addFlash('notice', 'Merci pour votre inscription.');
            //return $this->redirectToRoute('app_login');
        }

        return $this->render('register/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
