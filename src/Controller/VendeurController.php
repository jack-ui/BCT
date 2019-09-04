<?php

namespace App\Controller;

use App\Entity\Commande;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Boutique;
use App\Form\BoutiqueType;




class VendeurController extends AbstractController
{
//-------------------------POUR VENDRE Il faut SE CONNECTER---------------------------------
    
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


//---------------------------------AFFICHAGE du DASHBOARD VENDEUR----------------------- -------


    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function showDashboard()
    {   
        // Fonction qui redirige sur une page
        // Affiche le dashboard vendeur
        
        return $this -> render('vendeur/dashboard_vendeur.html.twig');
    }
    // test : localhost:8000/dashboard


//---------------------------GESTION DES COMMANDES-------------------------------------------


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
		   
		//     $this -> addFlash('success', 'La commande n°' . $commande->getReference() . ' a bien été modifiée !');
        //     return $this -> redirectToRoute('show_orders');
        // }
       
        //2 : Afficher la vue
        return $this->render('vendeur/order_form.html.twig', [
            //'commandeForm'=> $form ->createView()
        ]);

              
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
		   
		// return $this -> addFlash('success', 'La commande n°' .$commande->getReference() . ' a bien été supprimée !');
        

        //Redirection sur la liste des commandes
        return $this -> redirectToRoute('show_orders');
        
    }
    // test : localhost:8000/shop/delete_order_10

   //------------------------------ GESTION BOUTIQUE--------------------------------------

    
    /**
     * @Route("/sell/show_shop{id}", name="sell/show_shop")
     */
    public function showShop($id)
    {   
        //Fonction permettant d'afficher les boutiques
        //Affichage : tableau des boutiques

        $repository = $this->getDoctrine()->getRepository(Boutique::class);
        $boutique = $repository->find(Boutique::class, $id);

        return $this->render('vendeur/show_shops.html.twig', [
            'boutique' => $boutique
        ]);
    }
     
    //CRUD BOUTIQUE
    /**
     * @Route("/sell/shop/add", name="sell/shop_add")
     */
    public function addShop(Request $request)
    {   
        //Fonction pour ajouter une boutique
        //Affichera le formulaire d'une boutique 
        $boutique = new Boutique; 	   
        $form = $this -> createForm(BoutiqueType::class, $boutique); 
        $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
 
            $manager = $this -> getDoctrine() -> getManager();
            $manager -> persist($boutique);
            
            if($boutique -> getFile() != NULL){
			    $boutique -> uploadFile();
			}

                    
            $manager -> flush();
           
        
            $this -> addFlash('success', 'La boutique n°' . $boutique -> getId() . ' a bien été enregistré en BDD');
            return $this -> redirectToRoute('sell/show_shops'); 
             
        }
        
        return $this -> render('vendeur/shop_form.html.twig', [
            'boutiqueForm' => $form -> createView()
        ]);
      
        
  
    }

    /**
     * @Route("/sell/shop/update{id}", name="sell/shop_update")
     */
    public function updateShop($id, ObjectManager $manager, Request $request)
    {   
        //affiche le formulaire avec les infos d'une boutique
        //modifie une boutique en fonction de l'id
        $manager = $this -> getDoctrine() -> getManager();   
        $boutique = $manager -> find(Boutique::class, $id); 
        
        $form = $this -> createForm(BoutiqueType::class, $boutique);
        $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
        
            $manager -> persist($boutique);

            if($boutique -> getFile() != NULL){
			    $boutique -> uploadFile();
			}
            $manager -> flush(); 
            
            $this -> addFlash('success', 'La boutique '. $boutique->getNomBoutique() . ' a bien été modifiée !');
            return $this -> redirectToRoute('sell/show_shops');
        }
        return $this -> render('vendeur/shop_form.html.twig', [
            'boutiqueForm' => $form -> createView()
        ]);
    }

     /**
     * @Route("/admin/shop/delete{id}", name="admin/shop_delete")
     */
    public function deleteShop(ObjectManager $manager, $id)
    {   
        
        //Fonction permettant de supprimer une boutique en fonction de l'id
        //Affichage : redirige sur la page d'accueil
        $boutique = $manager->find(Boutique::class, $id);
        if($boutique)
        {
            $manager->remove($boutique);
            $manager->flush();

            $this->addFlash('success', 'la boutique '. $boutique->getNomBoutique() . ' a bien été supprimée');
        }    
        return $this -> redirectToRoute('/');
       
    }


}
