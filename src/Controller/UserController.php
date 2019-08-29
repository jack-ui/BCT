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
	* @Route("/register", name="register")
	*
	*/
	public function register(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
		
		$user = new User; 
		$form = $this -> createForm(UserType::class, $user);
		
		// traiter les infos du formulaire
		$form -> handleRequest($request);
		if($form -> isSubmitted() && $form -> isValid()){
			$manager -> persist($user);
			
			
			if($user -> getDateDeNaissance() -> format('Y') > date('Y') - 16 ){
				// si '2015' supérieur ('2019' - 16 = 2003)
				$this -> addFlash('errors', 'trop jeune');
				return $this -> redirectToRoute('index');
			}
			
			
			$user -> setRole('ROLE_USER'); 
			
			// Mdp saisi dans le formulaire :
			$password = $user -> getPassword(); 
			
			// on encode selon l'algo choisi dans security.yaml pour cette entité 
			$password_crypte = $encoder -> encodePassword($user, $password);
			$user -> setPassword($password_crypte);
			
			$manager -> flush();
			
			$this -> addFlash('success', 'Félicitations, votre inscription a bien été prise en compte !');
			return $this -> redirectToRoute('login');
		}
		
		return $this -> render('user/register.html.twig', [
			'userForm' => $form -> createView()
		]);
	}
	
	
}

