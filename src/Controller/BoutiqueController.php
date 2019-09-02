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
        //Fonction pour afficher la fiche d'un produit en fonction de l'id
        $repo = $this -> getDoctrine() -> getRepository(Produit::class);
        $produit = $repo -> find($id);
        
        return $this->render('boutique/show_product.html.twig', [
            'produit'=> $produit
        ]);
    }

    //CRUD PRODUIT
    /**
     * @Route("/shop/add_product", name="shop_add_product")
     */
    public function addProduct(Request $request, ObjectManager $manager)
    {
        //Fonction pour ajouter un produit
        //On affiche le formulaire du produit

        $produit = new Produit;
        $form = $this->createForm(ProduitType::class, $produit);

        // Traitement des infos du formulaire
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

       
    }

    /**
     * @Route("/shop/update_product{id}", name="shop_update_product")
     */
    public function productUpdate (ObjectManager $manager, Request $request, $id)
    {
        //Fonction permettant de modifier un produit en fonction de l'id
        //Affichage : le formulaire du produit à modifier
        $produit = $manager->find(Produit::class,$id);
        $form = $this->createForm(ProduitType::class, $produit);

        // Traitement des infos du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($produit);


            $manager->flush();

            $this->addFlash('success', 'Félicitations');
            return $this->redirectToRoute('shop');
        }

        return $this->render('boutique/product_form.html.twig', [
            'produitForm' => $form->createView(),
        ]);

    }

    /**
     * @Route("/shop/delete_product{id}", name="shop_delete_product")
     */
    public function deleteProduct($id, ObjectManager $manager)
    {
        //Fonction permettant de supprimer un produit en fonction de l'id
        //Affichage : redirige vers la liste des produits 

        $produit = $manager->find(Produit::class, $id);
        if($produit)
        {
            $manager->remove($produit);
            $manager->flush();

            $this->addFlash('success', 'le produit'. $nom . 'a bien été supprimé');
        }

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
