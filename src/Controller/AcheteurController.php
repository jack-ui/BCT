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
        //la recherche de produits ou de boutiques par lieu => affiche la liste des boutiques qui vendent le produit recherché ou la liste des boutiques dans les environs. 
        return $this -> render('acheteur/recherche.html.twig', [
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
