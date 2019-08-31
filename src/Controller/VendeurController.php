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
            //'commandes' => $commandes, 'statuts' => '$statuts'
        ]);
        
    }// test : localhost:8000/show_orders

    /**
     * @Route("shop/update_order_{id}", name="shop_update_order")
     */
    public function updateOrder($id, Request $request)
    {   
        //Fonction permettant de modifier une commande en fonction de l'id

        // 1 : Traitement du formulaire 
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

    /**
     * @Route("/sell_profile_{id}", name="sell_profile")
     */
    public function showProfile($id, ObjectManager $manager)
    {   
        //Fonction qui affiche le profil du vendeur actuellement connecté en fonction de l'id 
        //Récupérer l'id du vendeur actuellement connecté


        // 1 : Traitement du formulaire
        $manager = $this->getDoctrine()->getManager();
        $user = $manager->find(User::class,$id); 
        
        //2 : Afficher la vue
        if($user)
        {
            return $this -> render('vendeur/show_profile.html.twig', [
            'user'=> $user
            
        ]);
        }
    }
    // test : localhost:8000/sell_profile_10
    

     /**
     * @Route("/sell_profile_update{id}", name="sell_profile_update")
     */
    public function updateProfile($id)//???????????????????????
    {   
        //Fonction qui modifie les infos d'un vendeur 
        //Récupérer l'id du vendeur connecté pour modifier son profil 
        
        // 1 : Traitement du formulaire 
        // $manager = $this->getDoctrine()->getManager();
        // $user = $manager->find(User::class,$id) 

        // $form = $this -> createForm(UserType::class, $user);
	    // $form -> handleRequest($request);
	   
	    // if($form -> isSubmitted() && $form -> isValid()){
	   
		//     $manager -> persist($user);
		//     $manager -> flush(); 
		   
		//     $this -> addFlash('success', '$username votre profil a bien été modifié !');
        //     return $this -> redirectToRoute('sell_profile');
        // }
        return $this -> render('vendeur/vendeur_form.html.twig', [
            //'userForm' => $form->createView()
        ]);
        //return $this->redirectToRoute('sell_profile');
    }
    // test : localhost:8000/sell_profile_update_10


    /**
     * @Route("/sell_profile_delete{id}", name="sell_profile_delete")
     */
    public function deleteProfile($id)//?????????????????????
    {   
        //Fonction qui supprime le profil d'un vendeur,
        //Récupérer l'id du vendeur actuellement connecté pour le supprimer 
        //Rajouter une condition de validation de suppression par l'admin 

        //Affichage : redirection sur la page d'accueil
        return $this->redirectToRoute('/');
     
    }
    // test : localhost:8000/sell_profile_delete_10
    

}
