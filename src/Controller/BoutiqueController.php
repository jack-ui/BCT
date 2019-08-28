<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends AbstractController
{
    /**
     * @Route("/gestion_boutique", name="gestion_boutique")
     */
    public function afficherProduits()
    {   
        //afficher la liste des produits de la boutique

        return $this->render('tableau_produits.html.twig', [
          
        ]);
    }

    /**
     * @Route("/gestion_boutique/add", name="gestion_boutique_add")
     */
    public function produitAdd()
    {   
        //ajouter un produit

        return $this->render('produit_form.html.twig', [
          
        ]);

        // return $this -> redirectToRoute('gestion_boutique');
    }

     /**
     * @Route("/gestion_boutique/update", name="gestion_boutique_update")
     */
    public function produitUpdate()
    {   
        //modifier un produit

        return $this->render('produit_form.html.twig', [
          
        ]);

        // return $this -> redirectToRoute('gestion_boutique');
    }

     /**
     * @Route("/gestion_boutique/delete", name="gestion_boutique_delete")
     */
    public function produitDelete()
    {   
        //supprimer un produit

        return $this->render('produit_form.html.twig', [
          
        ]);

        // return $this -> redirectToRoute('gestion_boutique');
    }

    
    /**
     * @Route("/boutique", name="boutique")
     */
    public function afficherBoutique()
    {   
        //afficher la liste des boutiques
        //recherche par produits : liste des boutiques proches qui vendent le produit
        //rechercherche par boutique : liste des boutiques les plus proches

        return $this->render('liste_boutiques.html.twig', [
          
        ]);
    }

    /**
     * @Route("/statistique", name="statistique")
     */
    public function afficherStatistique()
    {   
        //afficher les statistiques
        //Chiffre d'affaire du jour, semaine, mois à l'instant t

        return $this->render('statistique.html.twig', [
          
        ]);
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function afficherCgu()
    {   
        //afficher les statistiques
        //Chiffre d'affaire du jour, semaine, mois à l'instant t

        return $this->render('cgu.html.twig', [
          
        ]);
    }

    

}
