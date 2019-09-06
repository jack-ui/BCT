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
        $user = $this -> getUser();



        // traiter les infos du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $boutique -> setUserId($user);
            $user -> setBoutiqueId($boutique);
            //On set l'id_user de la boutique et l'id_boutique du user (donc du vendeur)
            //On les lie car ils dépendent l'un de l'autre
            //Un user (vendeur) possède un id_boutique NON NULL
            //Une boutique possède un id_user NON NULL

            $manager->persist($boutique);
            $manager->persist($user);

            $boutique -> uploadFile();
            //gestion de la photo

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

        //Fonction permettant d'afficher la liste des produits de la boutique du vendeur actuellement connecté

        //Traitement du formulaire
        //$repository = $this->getDoctrine()->getRepository(Boutique::class);

       // $boutique = $this -> getUser() -> getBoutiqueId();


        //Afficher la vue
        return $this->render('boutique/products_table.html.twig', [
            //'boutique' => $boutique,
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
        $boutique = $this -> getUser() -> getBoutiqueId();


        // Traitement des infos du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // $produit -> setBoutiqueId($boutique); // pas necessaire car faite dans la fonction add de boutique entity
            $boutique -> addProduits($produit);
            $manager->persist($boutique);
            $manager->persist($produit);
            $produit -> uploadFile();
            //gestion de la photo
            $manager->flush();


            $this->addFlash('success', 'le produit '. $produit->getNom() . ' a bien été ajouté');
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

            $this->addFlash('success', 'le produit '. $produit->getNom() . ' a bien été modifié');
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

            $this->addFlash('success', 'le produit '. $produit->getNom() . ' a bien été supprimé');
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
