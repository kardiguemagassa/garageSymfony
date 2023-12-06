<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Classe\Search;
//use App\Form\SearchType;
use App\Entity\SearchCars;
use App\Entity\SearchData;
use App\Form\SearchCarsType;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarsController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    #[Route('/compte/nos-cars', name: 'cars')]
    public function index(CarsRepository $repo, Request $request, PaginatorInterface $paginatorInterface,): Response
    {
        $searchCars = new SearchCars();
        $formSearch = $this->createForm(SearchCarsType::class, $searchCars);
        $formSearch->handleRequest($request);
        
        $cars = $paginatorInterface->paginate(
            $repo->findAllWithPagination($searchCars),
            $request->query->getInt('page', 1), 6
        );

        // //==============================================
        // // verifier si j'ai la requete ajax
        // // return $this->json([
        // //      'html' => $html
        // //  ]);
        // if($request->get('ajax')){
        //     //return new JsonResponse([
        //         return $this->json([
        //         'content' =>$this->renderView('cars/single_car.html.twig', compact('cars'))
        //     ]);
        // }
        // //==============================================

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


    //filter les cars
     #[Route('/cars/filters', name: 'cars_filters')]
     public function filteredAnnonces(CarsRepository $carsRepository ,Request $request): Response
    {
        
        //$searchCars = new SearchCars();
        //$formSearch = $this->createForm(SearchCarsType::class, $searchCars);
        //$formSearch->handleRequest($request);

        //$cars = $this->entityManager->getRepository(Cars::class, $formSearch)->filterAjax($searchCars);
        //$cars = $this->entityManager->getRepository(Cars::class, $formSearch)->findAllWithPagination($searchCars);
        //$cars = $carsRepository->filterAjax($formSearch);
        //dd($cars);

        $formSearch = $this->createSearchForm($request);
        $cars = $carsRepository->filterAjax($formSearch->getData());
        //dd($cars);
        
        // data json
        $html = $this->renderView('cars/single_car.html.twig', [
            'cars' => $cars,
            'formSearch' => $formSearch->createView()
         ]);

        //dd($html);
        

        return $this->json([
             "html" => $html
         ]);
    }


      private function createSearchForm(Request $request): FormInterface
    {
        $searchCars = new SearchCars();
        $formSearch = $this->createForm(SearchCarsType::class, $searchCars);
        $formSearch->handleRequest($request);
        return $formSearch;
    }


}