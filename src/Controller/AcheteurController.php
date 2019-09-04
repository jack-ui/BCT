<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 

class AcheteurController extends AbstractController
{

    /**
	* @Route("/search", name="search")
	*
    */
    public function search()
    {   
        //Fonction qui redirige vers une page
        //Affiche la page avec la barre de recherche et les encarts par catégories de produits
        return $this -> render('acheteur/recherche.html.twig', [
            ]);
       
    }
    //test : localhost:8000/search


    /**
	* @Route("/search_results", name="search_results")
	*
    */
    public function searchResults($term, Request $request)
    {
        //Fonction pour afficher les boutiques les plus proches qui correspondent au résultat demandé
        //La recherche se fait en fonction de $term (à mettre en argument et sur la route)

        //Ex recherche par code postal (non par boutique car l'acheteur ne connait pas le nom des boutiques)
        //SELECT localisation FROM boutique WHERE localisation LIKE '95%'

        //Recherche par produit ici tomate
        //SELECT nom FROM produit WHERE nom = tomate 
        //IN (SELECT boutique_id FROM boutique WHERE id = id_boutique)
        // IN (SELECT localisation FROM boutique WHERE localisation LIKE 95%) 
        //???????????????????????
        
        //solution 1 pour simplifier : recherche uniquement par code postal ou par ville
        // Affichera la liste des boutiques de la ville
        //------------------------------------------------------------

        $term = $request->query->get('champs');
        //$term contient la valeur du terme saisi

        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findProductBySearch($term);
         
        return $this -> render('acheteur/search_results.html.twig', [
           'produits' => $produits 
        ]);
    } 
    //test : localhost:8000/search_results
    

    /**
	* @Route("/add_cart", name="add_cart")
	*
    */
    public function addToCart(Request $request)
    {
        // RECUS EN POST : 
        $quantite = $request -> request -> get('quantite');
        $id = $request -> request -> get('id');

        // creation du panier s'il n'existe pas déjà
        $session = $request -> getSession();
        if(!$session -> has('panier') ){
            $session -> set('panier', array());
        }
        
        // On enregistre dans le panier (en session) les infos du produit commandé :
        $panier = $session -> get('panier');



        // On check que le produit qu'on ajoute n'existe pas déja dans le panier
        if(array_key_exists($id, $panier)){
            $quantite_actuelle = $panier[$id]; 
            $ajout_quantite = $quantite;
            $nouvelle_quantite = $ajout_quantite + $quantite_actuelle;
            //---
            $panier[$id] = $nouvelle_quantite;
        }
        else{
            $panier[$id] = (int) $quantite;
        }

        $session -> set('panier', $panier);

        $this -> addFlash('success', 'Le produit '. $id .' a été ajouté au panier');
        return $this -> redirectToRoute('product', ['id' => $id]);
    }


    /**
	* @Route("/cart", name="show_cart")
	*
    */
    public function showCart(Request $request)
    {
        $repo = $this -> getDoctrine() -> getRepository(Produit::class);
        $session = $request -> getSession();

        if($session -> has('panier')){
            $panierSess = $session -> get('panier');
        }
        else{
            return;
        }

        $panier = array(); // array qui sera composé d'objets Produits
        foreach($panierSess as $key => $valeur){
            $produit = $repo -> find($key);
            $produit -> quantite = $valeur;
            $panier[] = $produit;
        }

        return $this -> render('acheteur/panier.html.twig', [
            'panier' => $panier
        ]);
    } ///VOIR POUR LE PANIER, ON NE L'A PAS FAIT EN COURS




    /**
	* @Route("/confirmation", name="confirmation")
	*
    */
    public function confirmation()
    {
        //affiche la vue de confirmation de commande avec id commande, status, récap, adresse livraison...
        return $this -> render('acheteur/confirmation.html.twig', [
		]);
    }
}
