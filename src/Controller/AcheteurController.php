<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 

class AcheteurController extends AbstractController
{
    /**
	* @Route("/achat", name="achat")
	*
    */
    
    public function achat()
    {
        //quand on clique sur le bouton achat sur la page d'accueil, on est dirigé vers la page de recherches. 
    }

        // A VERIFIER, je pense qu'il n'est pas utile d'avoir cette route achat puisque le bouton se trouve sur la page d'accueil et on est dirigé vers la page recherche. 



    /**
	* @Route("/recherche", name="recherche")
	*
    */

    public function recherche()
    {
        //la recherche de produits ou de boutiques par lieu => affiche la liste des boutiques qui vendent le produit recherché ou la liste des boutiques dans les environs. 
        return $this -> render('acheteur/recherche.html.twig', [
            ]);
    }
    


    /**
	* @Route("/panier", name="panier")
	*
    */

    public function panier()
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
        return $this -> render('acheteur/confirmation_commande.html.twig', [
		]);
    }
}
