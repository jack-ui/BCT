<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Boutique;
use App\Entity\Commande;
use App\Entity\ProduitCommande;
use App\Form\BoutiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class AcheteurController extends AbstractController
{
    //----------------------------GESTION DE LA RECHERCHE---------------------------------------------------------    

    /**
     * @Route("/search", name="search")
     *
     */
    public function search()
    {
        //Fonction qui redirige vers une page
        //Affiche la page avec la barre de recherche et les encarts par catégories de produits
        return $this->render('acheteur/recherche.html.twig', []);
    }
    //test : localhost:8000/search


    /**
     * @Route("/search_results", name="search_results")
     *
     */
    public function searchResults(Request $request)
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
        $user = $this->getUser();

        if ($user == NULL) {
            $produits = $repo->findTermSearch($term);
            // if($produits == NULL ){

            //     return 'Ce ' . $produits->getNom() . ' est indisponible actuellement';
            // }


        }
        //Si l'utilisateur n'est pas connecté la recherche sera uniquement en fonction de $term
        //Le résultat retourné sera la liste des produits correspondant au champs saisi ($term)

        else{
            $produits = $repo->findTermSearchLocal($term, $user -> getCodePostal());
            // if($produits == NULL ){

            //     return $this->addFlash('danger', 'Ce ' . $produits->getNom() . ' est indisponible actuellement');
            // }

        }
        //Si l'utilisateur est connecté la recherche sera en fonction de $term et du code postal du user
        //On veut que $code postal du user soit = () $code postal de la boutique
        //Le résultat retourné sera la liste des produits correspondant au champs $term et disponibles dans le département du user



        return $this->render('acheteur/search_results.html.twig', [
            'produits' => $produits,
        ]);
    }
    //test : localhost:8000/search_results

    //------------------------------------AFFICHER DES BOUTIQUES ---------------------------------------------

    /**
     * @Route("/buy/show_shops", name="buy/show_shops")
     */
    public function showShops()
    {
        //Fonction permettant d'afficher les boutiques
        //Affichage : tableau des boutiques

        $repository = $this->getDoctrine()->getRepository(Boutique::class);
        $boutiques = $repository->findAll();

        return $this->render('acheteur/show_shops.html.twig', [
            'boutiques' => $boutiques
        ]);
    }

    //--------------------------AFFICHER LES BOUTIQUES par CATEGORIES de PRODUITS ------------------------------------
    /**
     * @Route("/category/{cat}", name="category")
     *
     */
    public function category($cat)
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repository->findAllByCat($cat);

        $boutiques = array();
        foreach ($produits as $produit) {
            $boutiques[] = $produit->getBoutiqueId();
        }

        return $this->render('acheteur/show_shops_category.html.twig', [
            'boutiques' => $boutiques
        ]);
    }

    //--------------------------AFFICHER UNE SEULE BOUTIQUE-------------------------------------

    /**
     * @Route("/buy/show_shop{id}", name="buy/show_shop")
     */
    public function showShop($id)
    {

        $repository = $this->getDoctrine()->getRepository(Boutique::class);
        $boutique = $repository->find($id);


        return $this->render('acheteur/show_shop.html.twig', [
            'boutique' => $boutique,

        ]);
    }


    //------------------------------------AFFICHER LES PRODUITS DE LA BOUTIQUE--------------------------------

    /**
     * @Route("/buy/shop_product{id}", name="buy/shop_product")
     */
    public function showProductShop($id)
    {
        //Fonction permettant d'afficher la liste des produits de la boutique sélectionnée

        //On récupère les produits par boutique
        $repository = $this->getDoctrine()->getRepository(Produit::class);

        $produits = $repository->findAllByShop($id);

        //Afficher la vue
        return $this->render('acheteur/products_table.html.twig', [
            'produits' => $produits

        ]);
    }


//-------------------AFFICHER UN PRODUIT SELECTIONNE---------------------------

// Voir dans boutiquecontroller @Route("/product_{id}", name="product")





    //-----------------------------------AJOUTER AU PANIER-------------------------------------------------------------
    /**
     * @Route("/add_cart", name="add_cart")
     *
     */
    public function addToCart(Request $request)
    {
        // RECUS EN POST : 
        $quantite = $request->request->get('quantite');
        $id = $request->request->get('id');

        // creation du panier s'il n'existe pas déjà
        $session = $request->getSession();
        if (!$session->has('panier')) {
            $session->set('panier', array());
        }

        // On enregistre dans le panier (en session) les infos du produit commandé :
        $panier = $session->get('panier');



        // On check que le produit qu'on ajoute n'existe pas déja dans le panier
        if (array_key_exists($id, $panier)) {
            $quantite_actuelle = $panier[$id];
            $ajout_quantite = $quantite;
            $nouvelle_quantite = $ajout_quantite + $quantite_actuelle;
            //---
            $panier[$id] = $nouvelle_quantite;
        } else {
            $panier[$id] = (int) $quantite;
        }

        $session->set('panier', $panier);

        $this->addFlash('success', 'Le produit ' . $id . ' a été ajouté au panier');
        return $this->redirectToRoute('product', ['id' => $id]);
    }


    //----------------------------AFFICHE LE PANIER----------------------


    /**
     * @Route("/cart", name="show_cart")
     *
     */
    public function showCart(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $session = $request->getSession();

        if ($session->has('panier')) {
            $panierSess = $session->get('panier');
        } else {
            return $this->render('acheteur/paniervide.html.twig', []);
        }

        $panier = array(); // array qui sera composé d'objets Produits
        foreach ($panierSess as $key => $valeur) {
            $produit = $repo->find($key);
            $produit->quantite = $valeur;
            $panier[] = $produit;
        }

        return $this->render('acheteur/panier.html.twig', [
            'panier' => $panier
        ]);
    }



    /**
     * @Route("/delete_cart", name="delete_cart")
     *
     */

    function deleteCart(Request $request)
    {
        //on vérifie dans la session que le panier existe et qu'il n'est pas vide, s'il n'est pas vide on le vide en le transformant en array vide. 
        $session = $request->getSession();
        if ($session->get("panier")) {
            $panier = $session->set("panier", []);
        };

        return $this->redirectToRoute("index");
    }


    //----------------------------VALIDATION DE LA COMMANDE----------------------

    /**
     * @Route("/place_order", name="place_order")
     *
     */

    function PlaceOrder(Request $request, ObjectManager $manager)
    {
        //on valide la commande en envoyant les données du panier dans la BDD : tables Commande et ProduitCommande

        // On récupére les infos du panier :
        $panier = $request->getSession()->get('panier');
        $commande = new Commande;
        $montantTotal = 0;

        // Pour chaque Pdt du panier :
        // on récup le prix * quantite (pour le calcul total)
        // on créer un produitCommande et le lie à la commande en cours
        foreach ($panier as $id => $quantite) {
            $pdt = $manager->find(Produit::class, $id);

            // ON incrémente le mont total
            $montantTotal += $pdt->getPrix() * $quantite;

            // On récupére la boutique pour l'ajouter à ProduitCommande
            $idBoutique = $pdt->getBoutiqueId();

            // On crée les details de la commande dans produitCommande pour chaque produit
            $pc = new ProduitCommande();
            $pc->setProduit($pdt);
            $pc->setCommande($commande);
            $pc->setQuantite($quantite);
            $manager->persist($pc);

            // On retire le stock acheté
            $stockInitial = $pdt->getStock();
            $pdt->setStock($stockInitial - $quantite);
            $manager->persist($pdt);
        }

        $commande->setMontant($montantTotal);
        $commande->setBoutiqueId($idBoutique);
        $commande->setUserId($this->getUser());
        $commande->setEtat('en préparation');
        $commande->setDate(new \DateTime('now'));
        $manager->persist($commande);

        $manager->flush();

        // vider le panier
        $request->getSession()->set('panier', []);

        // Message de felicitations
        // envoie d'un email au proprio de la boutique
        // envoie d'un email à l'acheteur
        // redirection vers une page de confirmation (ou profil ou accueil)
        return $this->redirectToRoute("confirmation");
    }


    //----------------------------CONFIRMATION DE LA COMMANDE----------------------

    /**
     * @Route("/confirmation", name="confirmation")
     *
     */
    public function confirmation()
    {
        //affiche la vue de confirmation de commande avec id commande, status, récap, adresse livraison...
        return $this->render('acheteur/confirmation.html.twig', []);
    }
}
