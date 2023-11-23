<?php

namespace App\Controller;

use App\Entity\Address;
use App\Form\AddressType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountAddressController extends AbstractController
{

    private $entityMnanger;

    public function __construct(EntityManagerInterface $entityMnanger){
        $this->entityMnanger = $entityMnanger;
    }


    #[Route('/compte/address', name: 'account_address')]
    public function index(): Response
    {
        return $this->render('account/address.html.twig', [
            'controller_name' => 'AccountAddressController',
        ]);
    }


    #[Route('/compte/ajouter-une-addresse', name: 'account_address_add')]
    public function add(Request $request): Response{

        //dd($this->getUser());
        $address = new Address();
        $form = $this->createForm(AddressType::class, $address);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $address->setUser($this->getUser());
            $this->entityMnanger->persist($address);
            $this->entityMnanger->flush();
            return $this->redirectToRoute("account_address");
        }


        return $this->render('account/address_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/compte/modifier-une-addresse/{id}', name: 'account_address_edit')]
    public function edit(Request $request, $id): Response{

        //dd($this->getUser());
        $address = $this->entityMnanger->getRepository(Address::class)->findOneById($id);

        if(!$address || $address->getUser() !=$this->getUser()){
            return $this->redirectToRoute('account_address');
        }

        $form = $this->createForm(AddressType::class, $address);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->entityMnanger->flush();

           return $this->redirectToRoute("account_address");
        }


        return $this->render('account/address_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/compte/supprimer-une-addresse/{id}', name: 'account_address_delete')]
    public function delete(Request $request, $id): Response{

        $address = $this->entityMnanger->getRepository(Address::class)->findOneById($id);

        if($address && $address->getUser() ==$this->getUser()){
            $this->entityMnanger->remove($address);
            $this->entityMnanger->flush();
        }
        return $this->redirectToRoute('account_address');
    }
    
}
