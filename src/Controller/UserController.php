<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        $user = new User; 
        $form = $this -> createForm(UserType::class, $user);
        
        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
