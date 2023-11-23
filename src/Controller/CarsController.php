<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Classe\Search;
//use App\Form\SearchType;
use App\Entity\SearchCars;
use App\Form\SearchCarsType;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarsController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    #[Route('/nos-cars', name: 'cars')]
    public function index(CarsRepository $repo, Request $request, PaginatorInterface $paginatorInterface,): Response
    {

        $searchCars = new SearchCars();
        $formSearch = $this->createForm(SearchCarsType::class, $searchCars);
        $formSearch->handleRequest($request);
        
        $cars = $paginatorInterface->paginate(
            $repo->findAllWithPagination($searchCars),
            $request->query->getInt('page', 1), 6
        );

        return $this->render('cars/index.html.twig', [
            'cars' => $cars,
            'formSearch' => $formSearch->createView()
        ]);
    }


    #[Route('/car/{id}', name: 'car')]
    public function show($id): Response{

        $car = $this->entityManager->getRepository(Cars::class)->findOneById($id);
        $cars = $this->entityManager->getRepository(Cars::class)->findByisBest(1);
        //dd($car);
        if(!$car){
            return $this->redirectToRoute('cars');
        }

        return $this->render('cars/show.html.twig', [
            'car' => $car,
            'cars' => $cars,
        ]);
    }


     // filter les cars
     #[Route('/cars/filters', name: 'cars_filters')]
     public function filteredAnnonces(CarsRepository $carRepos ,Request $request): Response
    {
        // $form = $this->createSearchForm($request);
        // $car = $carRepos->findAllWithPagination($form->getData());
        // $html = $this->renderView('cars/filter.html.twig', [
        //      'cars' => $cars,
        //      'formSearch' => $formSearch->createView()
        //  ]);
 
        // return $this->json([
        //      'html' => $html
        //  ]);

        
        $searchCars = new SearchCars();
        $formSearch = $this->createForm(SearchCarsType::class, $searchCars);
        $formSearch->handleRequest($request);

        $cars = $this->entityManager->getRepository(Cars::class, $formSearch)->findAllWithPagination($searchCars);
        
        // data json
        $html = $this->renderView('cars/filter.html.twig', [
             'cars' => $cars,
             'formSearch' => $formSearch->createView()
         ]);
 
        return $this->json([
             'html' => $html
         ]);
    }



    // //exple json
    // use Symfony\Component\HttpFoundation\JsonResponse;
    // // ...
    // public function indexeee(): JsonResponse
    // {
    //     return $this->json(['email' => 'daniel.martin@free.fr’']);
    // }




    // #[Route('/get_cars', name: 'get_cars')]
    // public function getAllCars(CarsRepository $carsRepository, Request $request): JsonResponse
    // {
    //     $jsonData = json_decode($request->getContent(), true);

    //     $marque = $jsonData['marque'];
    //     $kilometre = $jsonData['kilometre'];
    //     $annee = $jsonData['annee'];
    //     $price = $jsonData['price'];

    //     $filteredCars = $carsRepository->findByFilters($marque, $kilometre, $annee, $price * 100); 

    //     $filteredData = [];
    //     foreach ($filteredCars as $cars) {
    //         $filteredData[] = [
    //             'id' => $cars->getId(),
    //             'marque' => $cars->getMarque(),
    //             'kilometre' => $cars->getKilometre(),
    //             'annee' => $cars->getAnnee(),
    //             'price' => $cars->getPrice(),
    //             'image'=> $cars->getImage(),
    //             'url' => $this->generateUrl('app_formulaire_from_card', [
    //                 'marque' => $cars->getMarque(),
    //                 'price' => $cars->getPrice(),
    //             ])
    //         ];
    //     }

    //     return new JsonResponse($filteredData);
    // }

}