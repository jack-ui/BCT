<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends AbstractController
{   

    
    /**
     * @Route("/create_shop", name="create_shop")
     */
    public function createShop()
    {   
        
        //fonction pour créer une boutique
    
        return $this->render('boutique/shop_form.html.twig', [
          
        ]);
    }
    /**
     * @Route("/shop", name="shop")
     */
    public function showProducts()
    {   
        
        //afficher la liste des produits de la boutique
        return $this->render('boutique/products_table.html.twig', [
          
        ]);
    }

     /**
     * @Route("/product_{id}", name="product")
     */
    public function showProduct($id)
    {   
        //afficher la fiche d'un produit en fonction de l'id

        return $this->render('boutique/show_product.html.twig', [
          
        ]);
    }

    //CRUD PRODUIT
    /**
     * @Route("/shop/add_product", name="shop_add_product")
     */
    public function addProduct()
    {   
        //ajouter un produit
        //afficher le formulaire du produit

        return $this->render('boutique/product_form.html.twig', [
          
        ]);

        // return $this -> redirectToRoute('shop');
    }

     /**
     * @Route("/shop/update_{id}", name="shop_update")
     */
    public function productUpdate($id)
    {   
        //modifier un produit en fonction de l'id
        //afficher le formulaire du produit

        return $this->render('boutique/product_form.html.twig', [
          
        ]);

        // return $this -> redirectToRoute('shop');
    }

     /**
     * @Route("/shop/delete_{id}", name="shop_delete")
     */
    public function deleteProduct($id)
    {   
        //supprimer un produit en fonction de l'id
        //redirige vers la liste des produits 

        return $this -> redirectToRoute('shop');

        
    }


    // /**
    //  * @Route("/stats", name="stats")
    //  */
    // public function showStats()
    // {   
    //     //afficher les statistiques
    //     //Chiffre d'affaire du jour, semaine, mois à l'instant t
    //     //BONUS, A VOIR PLUS TARD

    //     return $this->render('boutique/stats.html.twig', [
          
    //     ]);
    // }

   

    

}
