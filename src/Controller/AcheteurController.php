<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 

class AcheteurController extends AbstractController
{

    /**
	* @Route("/search", name="search")
	*
    */
    public function search()
    {   
        //Fonction qui redirige vers une page
        //Affiche la page avec la barre de recherche et les encarts par catégories de produits
        return $this -> render('acheteur/recherche.html.twig', [
            
        ]);
       
    }
    //test : localhost:8000/search


    /**
	* @Route("/search_results", name="search_results")
	*
    */
    public function searchResults(Request $request)
    {
        //Fonction pour afficher les boutiques les plus proches qui correspondent au résultat demandé
        //La recherche se fait en fonction de $term (à mettre en argument et sur la route)

        //Ex recherche par code postal (non par boutique car l'acheteur ne connait pas le nom des boutiques)
        //SELECT localisation FROM boutique WHERE localisation LIKE '95%'

        //Recherche par produit ici tomate
        //SELECT nom FROM produit WHERE nom = tomate 
        //IN (SELECT boutique_id FROM boutique WHERE id = id_boutique)
        // IN (SELECT localisation FROM boutique WHERE localisation LIKE 95%) 
        //???????????????????????
        
        //solution 1 pour simplifier : recherche uniquement par code postal ou par ville
        // Affichera la liste des boutiques de la ville
        //------------------------------------------------------------

        $term = $request->query->get('champs');
        //$term contient la valeur du terme saisi

        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $user = $this -> getUser();

        if($user == NULL){
            $produits = $repo->findTermSearch($term);
            // if($produits == NULL ){
            
            //     return 'Ce ' . $produits->getNom() . ' est indisponible actuellement';
            // }
    
    
        }
        else{
            $produits = $repo->findTermSearchLocal($term, $user -> getDepartement());
            // if($produits == NULL ){
            
            //     return $this->addFlash('danger', 'Ce ' . $produits->getNom() . ' est indisponible actuellement');
            // }
          
        }
        
               
        return $this -> render('acheteur/search_results.html.twig', [
           'produits' => $produits,
        ]);
    } 
    //test : localhost:8000/search_results
    


    /**
	* @Route("/cart", name="cart")
	*
    */
    public function addToCart()
    {
        return $this -> redirectToRoute('confirmation'); //si la commande est validée, on va vers la page confirmation
    } ///VOIR POUR LE PANIER, ON NE L'A PAS FAIT EN COURS




    /**
	* @Route("/confirmation", name="confirmation")
	*
    */
    public function confirmation()
    {
        //affiche la vue de confirmation de commande avec id commande, status, récap, adresse livraison...
        return $this -> render('acheteur/confirmation.html.twig', [
		]);
    }
}
