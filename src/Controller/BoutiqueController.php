<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Entity\Produit;
use App\Form\BoutiqueType;
use App\Form\ProduitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BoutiqueController extends AbstractController
{


    /**
     * @Route("/create_shop", name="create_shop")
     */
    public function createShop(Request $request, ObjectManager $manager)
    {

        //fonction pour créer une boutique
        //on affiche le formulaire de la boutique

        $boutique = new Boutique;
        $form = $this->createForm(BoutiqueType::class, $boutique);

        // traiter les infos du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($boutique);


            $manager->flush();

            $this->addFlash('success', 'Félicitations');
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('boutique/shop_form.html.twig', [

            'boutiqueForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/shop", name="shop")
     */
    public function showProducts()
    {

        //afficher la liste des produits de la boutique

        //1 : Récupérer tous les produits et la liste de toutes les catégories
        // SELECT * FROM produit 
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repository->findAll();

        // SELECT DISTINCT p.categorie FROM produit p  ORDER BY p.categorie ASC
        $categories = $repository->findAllCategories();

        //2 : Afficher la vue

        return $this->render('boutique/products_table.html.twig', [
            'produits' => $produits,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/product_{id}", name="product")
     */
    public function showProduct($id)
    {
        //afficher la fiche d'un produit en fonction de l'id

        return $this->render('boutique/show_product.html.twig', []);
    }

    //CRUD PRODUIT
    /**
     * @Route("/shop/add_product", name="shop_add_product")
     */
    public function addProduct(Request $request, ObjectManager $manager)
    {
        //ajouter un produit
        //afficher le formulaire du produit

        //fonction pour créer une boutique
        //on affiche le formulaire de la boutique

        $produit = new Produit;
        $form = $this->createForm(ProduitType::class, $produit);

        // traiter les infos du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($produit);


            $manager->flush();

            $this->addFlash('success', 'Félicitations');
            return $this->redirectToRoute('shop');
        }


        return $this->render('boutique/product_form.html.twig', [
            'produitForm' => $form->createView()
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

        return $this->render('boutique/product_form.html.twig', []);

        // return $this -> redirectToRoute('shop');
    }

    /**
     * @Route("/shop/delete_{id}", name="shop_delete")
     */
    public function deleteProduct($id)
    {
        //supprimer un produit en fonction de l'id
        //redirige vers la liste des produits 

        return $this->redirectToRoute('shop');
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
