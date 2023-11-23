<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    
    
    #[Route('/mon-panier', name: 'cart')]
    public function index(RequestStack $stack): Response{

        $cartComplete = [];

        // if($cart->getSession()){
            
        // }
        
        foreach (($stack->getSession()->get('cart')) as $id => $quantity) {
            $service_object = $this->entityManager->getRepository(Services::class)->findOneById($id);

            if(!$service_object){
                $this->delete($id);
                continue;
            }

            $cartComplete[] = [
                'service' => $service_object,
                'quantity' => $quantity
            ];
        }

        //dd($cartComplete);
 
        $cart = ($stack->getSession()->get('cart'));

        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete,
        ]);
    }


    #[Route('/cart/add/{id}', name: 'add_to_cart')]
    public function add(Cart $cart, $id): Response{

        $cart->add($id);

        return $this->redirectToRoute('cart');
    }


    #[Route('/cart/remove/', name: 'remove_my_cart')]
    public function remove(Cart $cart): Response{

        $cart->remove();

        return $this->redirectToRoute('services');
    }


    #[Route('/cart/delete/{id}', name: 'delete_to_cart')]
    public function delete(Cart $cart, $id): Response{

        $cart->delete($id);

        return $this->redirectToRoute('cart');
    }

    #[Route('/cart/decrease/{id}', name: 'decrease_to_cart')]
    public function decrease(Cart $cart, $id): Response{
        $cart->decrease($id);
    
        return $this->redirectToRoute('cart'
        // , [
        //     'controller_name' => 'CartController',
        // ]
    );
    }
}
