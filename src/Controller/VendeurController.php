<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VendeurController extends AbstractController
{
    /**
     * @Route("/vendeur", name="vendeur")
     */
    public function index()
    {
        return $this->render('vendeur/index.html.twig', [
            'controller_name' => 'VendeurController',
        ]);
    }
}
