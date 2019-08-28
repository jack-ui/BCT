<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VendeurController extends AbstractController
{
    /**
     * @Route("/vendre", name="vendre")
     */
    public function vendre()
    {   //si je suis connecté je vais sur le dashboard vendeur

        //si je ne suis pas connecté je redirige sur la page de connexion
        // return $this -> redirectToRoute('login.html.twig');

        return $this->render('vendeur/dashboard_vendeur.html.twig', [
     ]);
    }

    /**
     * @Route("/gestion_commande", name="gestion_commande")
     */
    public function afficherCommandes()
    {   
        //affiche la liste de mes commandes

        return $this->render('vendeur/tableau_commandes.html.twig', [
        ]);
    }

    /**
     * @Route("/gestion_commande/add", name="gestion_commande_add")
     */
    public function commandeAdd()
    {   
        //permet d'ajouter une commande
        //affiche le formulaire


        return $this->render('vendeur/commande_form.html.twig', [
        ]);

        // return $this -> redirectToRoute('gestion_commande');
    }

    /**
     * @Route("/gestion_commande/update", name="gestion_commande_update")
     */
    public function commandeUpdate()
    {   
        //permet de modifier une commande en fonction de l'id
        //affiche le formulaire


        return $this->render('vendeur/commande_form.html.twig', [
        ]);
        // return $this -> redirectToRoute('gestion_commande');
    }

    /**
     * @Route("/gestion_commande/delete", name="gestion_commande_delete")
     */
    public function commandeDelete()
    {   
        //permet de supprimer une commande en fonction de l id
        //afficher la liste des commandes


        return $this->render('vendeur/tableau_commandes.html.twig', [
        ]);
        
    }

   


    

    

    

}
