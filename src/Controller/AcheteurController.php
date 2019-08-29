<?php

namespace App\Controller;

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
        //la page avec la barre de recherche
        return $this -> render('acheteur/recherche.html.twig', [
            ]);

            //dirige vers les résultats sous forme de liste
    }


    /**
	* @Route("/search_results", name="search_results")
	*
    */

    public function searchResults()
    {
        //la page avec le résultat de la recherche sous forme de liste de boutiques 
        return $this -> render('acheteur/search_results.html.twig', [
            ]);
    } 
    


    /**
	* @Route("/cart", name="cart")
	*
    */

    public function cart()
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
