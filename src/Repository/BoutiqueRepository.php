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
    public function findAllFruits($cat){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :fruit')
        -> setParameter(':fruit', $cat)
		-> getQuery()
		-> getResult();
    }


    /**
	* @return Boutiques[] Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des légumes
	*/
    public function findAllVegetables($cat){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :legume')
        -> setParameter(':legume', $cat)
		-> getQuery()
		-> getResult();
    }

    
    /**
	* @return Boutiques[] Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des produits laitiers
	*/
    public function findAllDairies($cat){

		$builder = $this->createQueryBuilder('b');

		return $builder
		-> select('b')
        -> join('b.id', 'p', 'WITH',  'p.categorie = :produit laitier')
        -> setParameter(':produit laitier', $cat)
		-> getQuery()
		-> getResult();
    }

    
   
    
 
    
}
