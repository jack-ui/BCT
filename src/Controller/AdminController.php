<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function showAdmin()
    {   
        // afficher le dashboard de l'admin
        // 2 volets : gestion user et gestion boutique
        return $this->render('admin/dashboard_admin.html.twig', [
            
        ]);
    }

    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function showUsers()
    {   
        // afficher la liste des users = volet gestion user
        
        return $this->render('admin/user_table.html.twig', [
            
        ]);
    }

    /**
     * @Route("/admin/user_{id}", name="admin_user")
     */
    public function showUser($id)
    {   
        // afficher un profil vendeur ou acheteur en fonction de l'id et/ou statut ??
        
        return $this->render('admin/user_profile.html.twig', [
            
        ]);
    }

   
    //CRUD USER
     /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function addUser()
    {   
        // afficher le formulaire d'un user // AFFICHER LE FORMULAIRE POUR AJOUTER UN COMPTE ???? UTILISER LE FORMULAIRE D'INSCRIPTION OU CREER UNE VUE DIFFERENTE ??? A VOIR !!!
        
        return $this->render('admin/user_form.html.twig', [
            
        ]);

        // return $this -> redirectToRoute('admin_users'); 
        //retourne sur la liste des users
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
    public function addShop()
    {   
        //affiche le formulaire avec les infos d'une boutique
        //ajoute une boutique

        return $this->render('admin/shop_form.html.twig', [
          
        ]);
        // return $this -> redirectToRoute('admin/show_shops'); 
        //redirige vers le tableau des boutiques 
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
