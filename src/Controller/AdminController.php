<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Boutique;
use App\Entity\User;
use App\Form\UserType;
use App\Form\BoutiqueType;
use Doctrine\Common\Persistence\ObjectManager;

class AdminController extends AbstractController

//---------------------------------------TABLEAU DE BORD DE L'ADMIN---------------------------------
{
    /**
     * @Route("/admin", name="admin")
     */
    public function showAdmin()
    {   
        // Fonction qui redirige vers un affichage
        // Affichage : 2 volets, gestion user et gestion boutique
        return $this->render('admin/dashboard_admin.html.twig', [
            
        ]);
    }

//------------------------------------GESTION DES USERS -----------------------------------------

    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function showUsers()
    {   
        // Fonction pour afficher tous les utilisateurs
        // Affichage : le tableau des produits
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();

        
        return $this->render('admin/user_list.html.twig', [
            'users'=> $users
        ]);
    }

    /**
     * @Route("/admin/user_{id}", name="admin_user")
     */
    public function showUser($id)
    {   
        //Fonction pour afficher un profil vendeur ou acheteur en fonction de l'id
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);

        return $this->render('admin/show_users.html.twig', [
            'user' => $user
        ]);
    }

   
    //CRUD USER
     /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function addUser(Request $request)
    {   
        //Fonction permettant d'ajouter un utilisateur
        //Affichage du formulaire d'ajout

       // Traitement du formulaire
       $user = new User; 
       $form = $this -> createForm(UserType::class, $user);
       $form -> handleRequest($request);
	   
	   if($form -> isSubmitted() && $form -> isValid()){

			$manager = $this -> getDoctrine() -> getManager();
			$manager -> persist($user);
						
			$manager -> flush();
			
	   
			$this -> addFlash('success', 'Le produit n°' . $user -> getId() . ' a bien été enregistré en BDD');
            return $this -> redirectToRoute('admin_users');
        }       
        
        return $this->render('admin/user_form.html.twig', [
            'userForm'=> $form->createView()
            ]);

        }

    /**
     * @Route("/admin/user/delete_{id}", name="admin_user_delete")
     */
    public function deleteUser($id, ObjectManager $manager)
    {   
        // supprime un user en fonction de l'id
        //puis afficher la liste des user mise à jour
        $user = $manager -> find(User::class, $id);
		
		if($user){
			$manager -> remove($user);
			$manager -> flush();
			
			$this -> addFlash('success',  'Le profil '.  $user->getUsername() . 'a bien été supprimé !');
		}			
        
        return $this -> redirectToRoute('admin_users'); 
        
    }

    /**
     * @Route("/admin/user/update_{id}", name="admin_user_update")
     */
    public function updateUser($id, Request $request)
    {   
        // Fonction permettant de modifier un user en fonction de l'id
        // Affichage : le formulaire à éditer d'un user
        
        $manager = $this -> getDoctrine() -> getManager();   
        $user = $manager -> find(User::class, $id); 
        
        $form = $this -> createForm(UserType::class, $user);
        $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
        
            $manager -> persist($user);
            $manager -> flush(); 
            
            $this -> addFlash('success', 'L\'utilisateur '. $user->getUsername() . ' a bien été modifié !');
            return $this -> redirectToRoute('admin_users');
        }
        
        
        return $this->render('admin/user_form.html.twig', [
            'userForm' => $form->createView()
        ]);
       
    }

//------------------------------ GESTION BOUTIQUE--------------------------------------

    /**
     * @Route("/admin/show_shops", name="admin/show_shops")
     */
    public function showShops()
    {   
        //Fonction permettant d'afficher les boutiques
        //Affichage : tableau des boutiques

        $repository = $this->getDoctrine()->getRepository(Boutique::class);
        $boutiques = $repository->findAll();

        return $this->render('admin/shop_list.html.twig', [
            'boutiques' => $boutiques
        ]);
    }

    /**
     * @Route("/admin/show_shop{id}", name="admin/show_shop")
     */
    public function showShop($id)
    {   
        //Fonction permettant d'afficher les boutiques
        //Affichage : tableau des boutiques

        $repository = $this->getDoctrine()->getRepository(Boutique::class);
        $boutique = $repository->find($id);

        return $this->render('admin/show_shops.html.twig', [
            'boutique' => $boutique
        ]);
    }
     
    //CRUD BOUTIQUE
    /**
     * @Route("/admin/shop/add", name="admin/shop_add")
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
            return $this -> redirectToRoute('admin/show_shops'); 
        }
        
        return $this -> render('admin/shop_form.html.twig', [
            'boutiqueForm' => $form -> createView()
        ]);
      
        
  
    }

    /**
     * @Route("/admin/shop/update{id}", name="admin/shop_update")
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
            return $this -> redirectToRoute('admin/show_shops');
        }
        return $this -> render('admin/shop_form.html.twig', [
            'boutiqueForm' => $form -> createView()
        ]);
    }

     /**
     * @Route("/admin/shop/delete{id}", name="admin/shop_delete")
     */
    public function deleteShop(ObjectManager $manager, $id)
    {   
        
        //Fonction permettant de supprimer une boutique en fonction de l'id
        //Affichage : redirige sur la vue de gestion des boutiques de l'admin
        $boutique = $manager->find(Boutique::class, $id);
        if($boutique)
        {
            $manager->remove($boutique);
            $manager->flush();

            $this->addFlash('success', 'la boutique '. $boutique->getNomBoutique() . ' a bien été supprimée');
        }    
        return $this -> redirectToRoute('admin/show_shops');
       
    }

   






}
