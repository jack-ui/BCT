<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    /**
	* @return Produit[] Returns an array of Produit objects
	* Fonction pour récupérer toutes les catégories
	*/
	public function findAllCategories(){
		$builder = $this -> createQueryBuilder('p');
		$builder 
			-> select('p.categorie')
			-> distinct(true)
			-> orderBy('p.categorie', 'ASC');
		return $builder -> getQuery() -> getResult();
    }
    

    public function findAllBySearch($term){
		
		$term = '%' . $term . '%';
		// ex : blanche ---> %blanche%
		
		$builder = $this -> createQueryBuilder('p');
		return $builder 
			//-> select('p')
			-> where('p.nom LIKE :term')
			-> orWhere('p.categorie LIKE :term')
			-> setParameter(':term', $term)
			-> getQuery() -> getResult();
	}

	public function findBySearh($term){

		$term = '%' . $term . '%';
		$builder = $this->createQueryBuilder('p');

		$builder
		-> select('p')
        -> join('p.boutique_id', 'b', 'WITH',  'b.departement = 78')
        -> where('p.nom LIKE :term')
		-> orWHere('p.categorie LIKE :term')
		-> orWHere('p.description LIKE :term')
		->setParameter(':term', $term)
		->getQuery()
		->getResults();
	}

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
