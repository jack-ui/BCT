<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 

use App\Form\UserType;
use App\Entity\User;  
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
	
	
	/**
	* @Route("/user", name="user")
	*
	*/
	public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
		
		$user = new User; 
		$form = $this -> createForm(UserType::class, $user);
		
		// traiter les infos du formulaire
		$form -> handleRequest($request);
		if($form -> isSubmitted() && $form -> isValid()){
			$manager -> persist($user);
			
			
			if($user -> getDateDeNaissance() -> format('Y') > date('Y') - 16 ){
				// si '2015' supérieur ('2019' - 16 = 2003)
				$this -> addFlash('errors', 'trop jeune');
				return $this -> redirectToRoute('accueil');
			}
			
			
			$user -> setRole('ROLE_USER'); 
			
			// Mdp saisi dans le formulaire :
			$password = $user -> getPassword(); 
			
			// on encode selon l'algo choisi dans security.yaml pour cette entité 
			$password_crypte = $encoder -> encodePassword($user, $password);
			$user -> setPassword($password_crypte);
			
			$manager -> flush();
			
			$this -> addFlash('success', 'Félicitations, votre inscription a bien été prise en compte !');
			return $this -> redirectToRoute('connexion');
		}
		
		return $this -> render('user/register.html.twig', [
			'userForm' => $form -> createView()
		]);
	}
	
	
	
	
	
	/**
	* @Route("/profil", name="profil")
	*
	*/
	// public function profil(){
	// 	return $this -> render('membre/profil.html.twig', []);
	// }
	
	/**
	* @Route("/commandes", name="commandes")
	*
	*/
	// public function commandes(){
	// 	return $this -> render('membre/commandes.html.twig', []);
	// }
	
	/**
	* @Route("/profil/update", name="profil_update")
	*
	*/
	// public function profilUpdate(Request $request, ObjectManager $manager){
	// 	$membre = $this -> getUser();
	// 	$form = $this -> createForm(MembreType::class, $membre, ['update' => true]);
		
	// 	$form -> handleRequest($request);
		
	// 	if($form -> isSubmitted() && $form -> isValid()){
			
	// 		$manager -> persist($membre);
	// 		$manager -> flush();
			
	// 		$this -> addFlash('success', 'Félicitations, votre profil est à jour !');
	// 		return $this -> redirectToRoute('profil');
	// 	}
	// 	return $this -> render('membre/register.html.twig', [
	// 		'membreForm' => $form -> createView()
	// 	]);
	// }
	
	
	
	
}

