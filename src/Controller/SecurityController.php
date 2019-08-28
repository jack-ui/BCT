<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    
	
	
	/**
	* @Route("/connexion", name="connexion")
	*
	*/
	public function connexion(AuthenticationUtils $auth){
		
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
	}
	
	/**
	* @Route("/deconnexion", name="deconnexion")
	*
	*/
	public function deconnexion(){}
	
	/**
	* @Route("/connexion_check", name="connexion_check")
	*
	*/
	public function connexionCheck(){}
}
