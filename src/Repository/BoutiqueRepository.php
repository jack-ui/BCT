<?php

namespace App\Repository;

use App\Entity\Boutique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Boutique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boutique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boutique[]    findAll()
 * @method Boutique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoutiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boutique::class);
    }

    // /**
    //  * @return Boutique[] Returns an array of Boutique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boutique
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    /**
	* @return Boutiques[] Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des fruits
	*/
    public function findAllFruits($fruits){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :fruits')
        -> setParameter('fruits', $fruits)
		-> getQuery()
		-> getResult();
    }


    /**
	* @return Boutiques[] Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des légumes
	*/
    public function findAllVegetables($veggies){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :veggies')
        -> setParameter('veggies', $veggies)
		-> getQuery()
		-> getResult();
    }

    
    /**
	* @return Boutiques[] Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des produits laitiers
	*/
    public function findAllDairies($dairies){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :dairies')
        -> setParameter('dairies', $dairies)
		-> getQuery()
		-> getResult();
    }

    
    /**
	* @return Boutiques[] Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des oeufs
	*/
    public function findAllEggs($eggs){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :eggs')
        -> setParameter('eggs', $eggs)
		-> getQuery()
		-> getResult();
    }
    
 
    
}
