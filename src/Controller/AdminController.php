<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Boutique;
use App\Entity\User;
use App\Form\UserType;
use App\Form\BoutiqueType;

class AdminController extends AbstractController
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
        
        return $this->render('admin/user_profile.html.twig', [
            
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
			

			// On enregistre la photo en BDD et sur le serveur. 
			// if($user -> getFile() != NULL){
			// 	$user -> uploadFile();
			// }
			
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
    public function deleteUser($id)
    {   
        // supprime un user en fonction de l'id
        //puis afficher la liste des user mise à jour
        
        return $this -> redirectToRoute('admin_users'); 
        
    }

    /**
     * @Route("/admin/user/update_{id}", name="admin_user_update")
     */
    public function updateUser($id)
    {   
        // modifier en fonction de l'id
        //afficher le formulaire à éditer d'un user
        // rediriger vers le profil d'un user
        
        return $this->render('user_form.html.twig', [
            
        ]);
        // return $this -> redirectToRoute('admin_user');
    }


    /**
     * @Route("/admin/show_shops", name="admin/show_shops")
     */
    public function showShops()
    {   
        //afficher la liste des boutiques sous forme de tableau

        return $this->render('admin/show_shops.html.twig', [
          
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
                    
            $manager -> flush();
           
        
            $this -> addFlash('success', 'La boutique n°' . $boutique -> getId() . ' a bien été enregistré en BDD');
            return $this -> redirectToRoute('admin/show_shops'); 
             
        }
        
        return $this -> render('admin/shop_form.html.twig', [
             'produitForm' => $form -> createView()
        ]);
      
        
  
    }

    /**
     * @Route("/admin/shop/update", name="admin/shop_update")
     */
    public function updateShop()
    {   
        //affiche le formulaire avec les infos d'une boutique
        //modifie une boutique en fonction de l'id

        return $this->render('admin/shop_form.html.twig', [
          
        ]);
        // return $this -> redirectToRoute('admin/show_shops');
        //redirige vers le tableau des boutiques 
    }

     /**
     * @Route("/admin/shop/delete", name="admin/shop_delete")
     */
    public function deleteShop()
    {   
        //affiche le formulaire avec les infos d'une boutique
        //supprime une boutique en fonction de l'id

        return $this->render('admin/shop_form.html.twig', [
          
        ]);
        // return $this -> redirectToRoute('admin/show_shops');
        //redirige vers le tableau des boutiques 
    }

   






}
