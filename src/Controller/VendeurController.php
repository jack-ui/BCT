<?php

namespace App\Controller;

use App\Entity\Commande;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;



class VendeurController extends AbstractController
{
    /**
     * @Route("/sell", name="sell")
     */
    public function sell()
    {   
        // Affiche les choix connexion ou inscription. 
        // Fonction qui redirige sur une page

        return $this -> redirectToRoute('login');
        //OU
        //return $this -> redirectToRoute('register');
    }
    // test : localhost:8000/sell

    /**
     * @Route("/dasboard", name="dashboard")
     */
    public function showDashboard()
    {   
        // Fonction qui redirige sur une page
        // Affiche le dashboard vendeur
        
        return $this -> render('vendeur/dashboard_vendeur.html.twig');
    }
    // test : localhost:8000/dashboard

    /**
     * @Route("/show_orders", name="show_orders")
     */
    public function showOrders()
    {   
        //Fonction qui retourne un affichage des commandes gérées par le vendeur

        //1 : Récupérer toutes les commandes dans la BDD
	    //$repo = $this -> getDoctrine() -> getRepository(Commande::class);
        //$commandes = $repo -> findAll();

        //PREVOIR UN AFFICHAGE PAR STATUT ? comme les catégories de produits vues dans le cours
        //$statuts = $repository->findAllCommandeStatut();
       
        //2 : Afficher la liste des commandes sous forme de tableau
        return $this->render('vendeur/show_orders.html.twig', [
            //'commandes' => $commandes, 
            //'statuts' => '$statuts'
        ]);
        
    }// test : localhost:8000/show_orders

    /**
     * @Route("shop/update_order_{id}", name="shop_update_order")
     */
    public function updateOrder($id, Request $request)
    {   
        //Fonction permettant de modifier une commande en fonction de l'id

        // 1 : Traitement du formulaire 
        //$manager = $this->getDoctrine()->getManager();
        // $commande = $manager->find(Commande::class,$id) 

        // $form = $this -> createForm(CommandeType::class, $commande);
	    // $form -> handleRequest($request);
	   
	    // if($form -> isSubmitted() && $form -> isValid()){
	   
		//     $manager -> persist($commande);
		//     $manager -> flush(); 
		   
		//     $this -> addFlash('success', 'La commande n°' . $id . ' a bien été modifiée !');
        //     return $this -> redirectToRoute('show_orders');
        // }
       
        //2 : Afficher la vue
        return $this->render('vendeur/order_form.html.twig', [
            //'commandeForm'=> $form ->createView()
        ]);

        // return $this->redirectToRoute('show_orders');
        
    }
    // test : localhost:8000/shop/update_order_10


    /**
     * @Route("/shop/delete_order_{id}", name="shop_order_delete")
     */
    public function deleteOrder($id)
    {   
        //Fonction permettant de supprimer une commande en fonction de l id

        // 1 : Traitement du formulaire
        // $manager = $this->getDoctrine()->getManager();
        // $commande = $manager->find(Commande::class,$id) 

        // $manager -> remove($commande);
		// $manager -> flush(); 
		   
		//     $this -> addFlash('success', 'La commande n°' . $id . ' a bien été supprimée !');
        

        //Redirection sur la liste des commandes
        return $this -> redirectToRoute('show_orders');
        
    }
    // test : localhost:8000/shop/delete_order_10

   

}
