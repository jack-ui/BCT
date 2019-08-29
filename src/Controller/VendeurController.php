<?php

namespace App\Controller;

use App\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class VendeurController extends AbstractController
{
    /**
     * @Route("/sell", name="sell")
     */
    public function sell()
    {   
        // est une page avec le choix connexion ou inscription. Quand on clique, envoie sur la route connexion ou la route inscription.

        return $this -> redirectToRoute('login');
        //OU
        //return $this -> redirectToRoute('register');
    }

    /**
     * @Route("/dasboard", name="dashboard")
     */
    public function showDashboard()
    {   
        //fonction qui retourne un affichage
        // affiche le dashboard vendeur
        return $this -> render('vendeur/dashboard_vendeur.html.twig');
    }

    /**
     * @Route("/show_orders", name="show_orders")
     */
    public function showOrders()
    {   
        //Récupérer toutes les commandes dans la BDD
	    //$repo = $this -> getDoctrine() -> getRepository(Commande::class);
        //$commandes = $repo -> findAll();

        //PREVOIR UN AFFICHAGE PAR STATUT ? comme les catégories de produits vues dans le cours

        //$statuts = $repository->findAllCommandeStatut();
       
        //Afficher la liste des commandes sous forme de tableau
        return $this->render('vendeur/show_orders.html.twig', [
        ]);
        // ['commandes' => $commandes, 'statuts' => '$statuts']
    }

    /**
     * @Route("shop/update_order_{id}", name="shop_update_order")
     */
    public function updateOrder($id, Request $request)
    {   
        //Fonction permettant de modifier une commande en fonction de l'id

        // $manager = $this->getDoctrine()->getManager();
        // $commande = $manager->find(Commande::class,$id) 

        // $form = $this -> createForm(CommandeType::class, $commande);
	    // $form -> handleRequest($request);
	   
	    // if($form -> isSubmitted() && $form -> isValid()){
	   
		//     $manager -> persist($commande);
		//     $manager -> flush(); 
		   
		//     $this -> addFlash('success', 'La commande n°' . $id . ' a bien été modifiée !');
        //     return $this -> redirectToRoute('show_orders');
        // }
	   
        return $this->render('vendeur/order_form.html.twig', [
            // 'commandeForm'=> $form ->createView()
        ]);
        
    }
    // test : localhost:8000/shop/update_order_10


    /**
     * @Route("/shop/delete_order_{id}", name="shop_order_delete")
     */
    public function deleteOrder($id)
    {   
        //Fonction permettant de supprimer une commande en fonction de l id
        // $manager = $this->getDoctrine()->getManager();
        // $commande = $manager->find(Commande::class,$id) 

        // $manager -> remove($commande);
		// $manager -> flush(); 
		   
		//     $this -> addFlash('success', 'La commande n°' . $id . ' a bien été supprimée !');
        

        //Redirection sur la liste des commandes
        return $this -> redirectToRoute('show_orders');
        
    }
    // test : localhost:8000/shop/delete_order_10

    /**
     * @Route("/sell_profile", name="sell_profile")
     */
    public function showProfile()
    {   
        //fonction qui affiche le profil d'un vendeur
        
        return $this -> render('vendeur/show_profile.html.twig');
    }

     /**
     * @Route("/sell_profile_update", name="sell_profile_update")
     */
    public function updateProfile()
    {   
        //fonction qui modifie les infos d'un vendeur
        //est ce qu'il faut récupérer l'id dans l'url pour modifier le vendeur actuellement connecté ?
        return $this -> render('vendeur/vendeur_form.html.twig');
    }
    //return $this->redirectToRoute('sell_profile');

    /**
     * @Route("/sell_profile_delete", name="sell_profile_delete")
     */
    public function deleteProfile()
    {   
        //fonction qui supprime le profil d'un vendeur
        //est ce qu'il faut récupérer l'id dans l'url pour supprimer le vendeur actuellement connecté ?
        return $this->redirectToRoute('/');
      
    }
    

}
