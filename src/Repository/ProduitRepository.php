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
		
		
		$builder = $this -> createQueryBuilder('p');
		return $builder 
			//-> select('p')
			-> where('p.nom LIKE :term')
			-> orWhere('p.categorie LIKE :term')
			-> setParameter(':term', $term)
			-> getQuery() -> getResult();
	}

	public function findTermSearch($term){

		$term = '%' . $term . '%';
		$builder = $this->createQueryBuilder('p');

		return $builder
		-> select('p')
		-> where('p.nom LIKE :term')
		// -> orWHere('p.categorie LIKE :term')
		// -> orWHere('p.description LIKE :term')
		-> setParameter(':term', $term)
		-> getQuery()
		-> getResult();
	}

	public function findTermSearchLocal($term, $dpt){

		$term = '%' . $term . '%';
		$builder = $this->createQueryBuilder('p');

		return $builder
		-> select('p')
        -> join('p.boutiqueId', 'b', 'WITH',  'b.departement = :dpt')
        -> where('p.nom LIKE :term')
		// -> orWHere('p.categorie LIKE :term')
		// -> orWHere('p.description LIKE :term')
		-> setParameter(':term', $term)
		-> setParameter(':dpt', $dpt)
		-> getQuery()
		-> getResult();
	}


	 /**
	* Returns an array of Boutique objects
	* Fonction pour récupérer toutes les boutiques qui ont des oeufs
	*/
    public function findAllByCat($cat){

		$builder = $this->createQueryBuilder('p');

		return $builder
		-> select('p')
		-> distinct('p.boutiqueId')
		-> where('p.categorie = :cat')
		-> setParameter(':cat', $cat)
		-> getQuery()
		-> getResult();
    }



	public function findAllByShop($id){

		
		$builder = $this->createQueryBuilder('p');

		return $builder
		-> select('p') 
		-> join('p.boutiqueId', 'b', 'WITH','b.id = :boutiqueId')
		-> setParameter(':boutiqueId', $id)
		-> getQuery()
		-> getResult();
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
