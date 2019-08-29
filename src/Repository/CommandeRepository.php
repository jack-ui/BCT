<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Commande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commande[]    findAll()
 * @method Commande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    // /**
    //  * @return Commande[] Returns an array of Commande objects
    //  */fonction pour récupérer toutes les commandes
    /*
    public function findAllCommandeStatut()
    {
       $builder = $this -> createQueryBuilder('c');
		$builder 
			-> select('c.statut')
			-> distinct(true)
			-> orderBy('p.statut', 'date DESC ');
		return $builder -> getQuery() -> getResult();
    }
    */

    /*
   	/**
	* @return Produit[] Returns an array of Produit objects
	* Fonction pour récupérer tous les statuts
	*//*
	public function findAllCommandeStatut2(){
		
		$query = $this -> getEntityManager() -> createQuery("SELECT distinct c.statut FROM App\Entity\Commande c ORDER BY c.statut, date DESC");
		
		return $query -> getResult();
	}
    */
}
