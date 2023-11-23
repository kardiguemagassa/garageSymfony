<?php

namespace App\Classe;

use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;


class Cart{

    private $stack;
    private $entityManager;

    public function __construct(RequestStack $stack, EntityManagerInterface $entityManager){
        $this->stack= $stack;
        $this->entityManager=$entityManager;
    }

    public function add($id){
 
        $session = $this->stack->getSession();

        $cart = $session->get('cart', []);
 
        if(!empty($cart[$id])){

            $cart[$id]++;

        } else {

            $cart[$id] = 1;
        }
 
        $session->set('cart', $cart);
    }

 
    public function get(){

        $methodget = $this->stack->getSession();

        return $methodget->get('cart');
    }
 

    public function remove(){
 
        $methodremove = $this->stack->getSession();

        return $methodremove->remove('cart');
    }

    public function delete($id){
 
        $session = $this->stack->getSession();
        $cart = $session->get('cart', []);
        unset($cart[$id]);
        return $session->set('cart',$cart);
    }


    public function decrease($id){
        $session = $this->stack->getSession();
        $cart = $session->get('cart', []);
        if ($cart[$id] > 1) {
            $cart[$id]--;
            //retirer une quantité
        } else {
            unset($cart[$id]);
        }
        
        
        return $session->set('cart',$cart);
       //verifier si la quantité de notre produit = 1
    }


    // // bug ici
    // public function getFull(){

    //     $cartComplete = [];

    //     // if($cart->getSession()){
            
    //     // }
        
    //     foreach (($this->getSession()->get('cart')) as $id => $quantity) {

    //         $service_object = $this->entityManager->getRepository(Services::class)->findOneById($id);

    //         if(!$service_object){
    //             $this->delete($id);
    //             continue;
    //         }
    //         $cartComplete[] = [
    //             'product' => $service_object,
    //             'quantity' => $quantity
    //         ];
    //     }
    //     return $cartComplete;
    // }
}