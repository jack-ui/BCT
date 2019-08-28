<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function afficherAdmin()
    {   
        // afficher le dashboard de l'admin
        // 2 volets : gestion user et gestion boutique
        return $this->render('admin/dashboard_admin.html.twig', [
            
        ]);
    }

    /**
     * @Route("/admin/user", name="admin_user")
     */
    public function afficherUsers()
    {   
        // afficher la liste des users = volet gestion user
        
        return $this->render('admin/tableau_user.html.twig', [
            
        ]);
    }

    /**
     * @Route("/admin/user", name="admin_user")
     */
    public function afficherProfil()
    {   
        // afficher un profil vendeur ou acheteur en fonction de l'id et/ou statut ??
        
        return $this->render('admin/user_form.html.twig', [
            
        ]);
    }

   
    //CRUD USER
     /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function ajouterUser()
    {   
        // afficher le formulaire d'un user
        
        return $this->render('admin/user_form.html.twig', [
            
        ]);

        // return $this -> redirectToRoute('admin_user');
    }

    /**
     * @Route("/admin/user/delete", name="admin_user_delete")
     */
    public function supprimerUser()
    {   
        // supprime un user en fonction de l'id
        //afficher la liste des user
        
        return $this->render('admin/tableau_user.html.twig', [
            
        ]);
        
    }

    /**
     * @Route("/admin/user/update", name="admin_user_update")
     */
    public function modifierUser()
    {   
        // modifier en fonction de l'id
        //afficher le formulaire d'un user
        
        return $this->render('user_form.html.twig', [
            
        ]);
        // return $this -> redirectToRoute('admin_user');
    }




}
