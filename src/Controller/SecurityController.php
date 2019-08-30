<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{



	/**
	* @Route("/login", name="login")
	*
	*/
	public function login(AuthenticationUtils $auth){

		$lastUsername = $auth -> getLastUsername();
		// récupérer le username

		$error = $auth -> getLastAuthenticationError();
		// récupérer les erreurs

		if(!empty($error)){
			$this -> addFlash('errors', 'Problème d\'identifiant !');
		}

		return $this -> render('security/login.html.twig', [
			'lastUsername' => $lastUsername
		]);

    $repo = $this -> getDoctrine() -> getRepository(User::class);
    $statutLogin = $repo -> find($statut);

    $repo = $this -> getDoctrine() -> getRepository(User::class);
    $statutShop = $repo -> find($boutique_id);
  //
  //   if ($statutLogin === 0)
  //   {
  // return $this -> redirectToRoute('search');
  //   }



    if ($statutLogin === 1)
    {
          if($statutShop  != NULL){
            return $this -> redirectToRoute('dashboard');
          }
          else{
            return $this -> redirectToRoute('create_shop');
          }
    }
    else{
        	return $this -> redirectToRoute('search');
    }


	}

	/**
	* @Route("/logout", name="logout")
	*
	*/
	public function logout(){}

	/**
	* @Route("/connexion_check", name="connexion_check")
	*
	*/
	public function connexionCheck(){}
}
