<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AcheteurController extends AbstractController
{
    /**
     * @Route("/acheteur", name="acheteur")
     */
    public function index()
    {
        return $this->render('acheteur/index.html.twig', [
            'controller_name' => 'AcheteurController',
        ]);
    }
}
