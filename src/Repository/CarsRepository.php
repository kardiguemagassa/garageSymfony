<?php

namespace App\Repository;

use App\Entity\Cars;

use Doctrine\ORM\Query;
use App\Entity\SearchCars;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\OptionsResolver\OptionsResolver;
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


    /**Requêtte qui permet de récuperer les voitures en fonction de la recherche de l'utilisateur 
     *return Cars[]
     filtrer par symfony
    */
    public function findAllWithPagination(SearchCars $searchCars): Query{
        //$req = $this->createQueryBuilder('c');
         $req = $this
            ->createQueryBuilder('c')
            ->select('b','c')
            ->join('c.brand','b');
               
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
    public function filterAjax(SearchCars $search){
        $query = $this
            ->createQueryBuilder('c')
            ->select('b','c')
            ->join('c.brand','b');

        if (!empty($search->getMinPrice())) {
            $query->andWhere('c.price >= :minPrice')
                ->setParameter('minPrice', $search->getMinPrice());
        }

        if (!empty($search->getMaxPrice())) {
            $query->andWhere('c.price <= :maxPrice')
                ->setParameter('maxPrice', $search->getMaxPrice());
        }

        if (!empty($search->getMinKilometer())) {
            $query->andWhere('c.kilometers >= :minKilometers')
                ->setParameter('minKilometers', $search->getMinKilometer());
        }

        if (!empty($search->getMaxKilometer())) {
            $query->andWhere('c.kilometers <= :maxKilometers')
                ->setParameter('maxKilometers', $search->getMaxKilometer());
        }

        if (!empty($search->getMinYear())) {
            $query->andWhere('c.year >= :minYear')
                ->setParameter('minYear', $search->getMinYear());
        }

        if (!empty($search->getMaxYear())) {
            $query->andWhere('c.year <= :maxYear')
                ->setParameter('maxYear', $search->getMaxYear());
        }

        if (!empty($search->getBrand())) {
            $query->andWhere('c.brand = :brand')
                ->setParameter('brand', $search->getBrand());
        }

        if (!empty($search->getEnergy())) {
            $query->andWhere('c.energy = :energy')
                ->setParameter('energy', $search->getEnergy());
        }

        return $query->getQuery()->getResult();
    }

}
