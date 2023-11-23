<?php

namespace App\Repository;

use App\Entity\Cars;
use App\Classe\Search;
use Doctrine\ORM\Query;
use App\Entity\SearchCars;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Cars>
 *
 * @method Cars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cars[]    findAll()
 * @method Cars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }


    /**Requêtte qui permet de récuperer les produits en fonction de la recherche de l'utilisateur 
     *return Product[] en gros filtré quoi
     filtrer par symfony
    */
    public function findAllWithPagination(SearchCars $searchCars): Query{
        $req = $this->createQueryBuilder('c');
               
        if($searchCars->getMinPrice()){
            $req = $req->andWhere('c.price >= :min')
            ->setParameter(':min', $searchCars->getMinPrice());
        }
        if($searchCars->getMaxPrice()){
            $req = $req->andWhere('c.price <= :max')
            ->setParameter(':max', $searchCars->getMaxPrice());
        }

        if($searchCars->getMinKilometer()){
            $req = $req->andWhere('c.kilometer >= :min')
            ->setParameter(':min', $searchCars->getMinKilometer());
        }
        if($searchCars->getMaxKilometer()){
            $req = $req->andWhere('c.kilometer <= :max')
            ->setParameter(':max', $searchCars->getMaxKilometer());
        }

        if($searchCars->getMinYear()){
            $req = $req->andWhere('c.year >= :min')
            ->setParameter(':min', $searchCars->getMinYear());
        }
        if($searchCars->getMaxYear()){
            $req = $req->andWhere('c.year <= :max')
            ->setParameter(':max', $searchCars->getMaxYear());
        }

        if($searchCars->getBrand()){
            $req = $req->andWhere('c.brand = :brand')
            ->setParameter(':brand', $searchCars->getBrand());
        }

        if($searchCars->getEnergy()){
            $req = $req->andWhere('c.energy = :energy')
            ->setParameter(':energy', $searchCars->getEnergy());
        } 
         return $req->getQuery();
    }


    // filtrer par fetch
    public function filterAjax(Search $search){
        $query = $this
            ->createQueryBuilder('c')
            ->select('b','c')
            ->join('c.brand','b');

        if (!empty($search->minPrice)) {
            $query->andWhere('c.price >= :priceMin')
                ->setParameter('priceMin', $search->minPrice);
        }

        if (!empty($search->maxPrice)) {
            $query->andWhere('c.price <= :priceMax')
                ->setParameter('priceMax', $search->maxPrice);
        }

        if (!empty($search->minKilometers)) {
            $query->andWhere('c.kilometers >= :kilometersMin')
                ->setParameter('kilometersMin', $search->minKilometers);
        }

        if (!empty($search->maxKilometers)) {
            $query->andWhere('c.kilometers <= :kilometersMax')
                ->setParameter('kilometersMax', $search->maxKilometers);
        }

        if (!empty($search->minYear)) {
            $query->andWhere('c.year >= :yearMin')
                ->setParameter('yearMin', $search->minYear);
        }

        if (!empty($search->maxYear)) {
            $query->andWhere('c.year <= :yearMax')
                ->setParameter('yearMax', $search->maxYear);
        }

        if (!empty($search->brand)) {
            $query->andWhere('c.brand = :brand')
                ->setParameter('brand', $search->brand);
        }

        if (!empty($search->energy)) {
            $query->andWhere('c.energy = :energy')
                ->setParameter('energy', $search->energy);
        }

        return $query->getQuery()->getResult();
    } 


}
