<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VendeurController extends AbstractController
{
    /**
     * @Route("/sell", name="sell")
     */
    public function sell()
    {   
        // est une page avec le choix connexion ou inscription. Quand on clique, envoie sur la route connexion ou la route inscription.
    }

    /**
     * @Route("/show_orders", name="show_orders")
     */
    public function showOrders()
    {   
        //affiche la liste des commandes sous forme de tableau

        return $this->render('vendeur/show_orders.html.twig', [
        ]);
    }

    /**
     * @Route("shop/update_order_{id}", name="shop_update_order")
     */
    public function updateOrder($id)
    {   
        //permet de modifier une commande en fonction de l'id
        //affiche le formulaire de modification


        return $this->render('vendeur/order_form.html.twig', [
        ]);
        // return $this -> redirectToRoute(''); //A VOIR sur quoi on redirige ?
    }


    /**
     * @Route("/shop/delete_order_{id}", name="shop_order_delete")
     */
    public function deleteOrder($id)
    {   
        //permet de supprimer une commande en fonction de l id
        //puis reviens sur la liste des commandes


        return $this -> redirectToRoute('show_orders');
        
    }



}
