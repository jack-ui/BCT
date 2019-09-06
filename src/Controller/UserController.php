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

//---------------------------INSCRIPTION------------------------------------------------	
	
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

//-----------------------------GESTION DU PROFIL PAR UN USER--------------------------------------------	
	
	 /**
     * @Route("/profile", name="profile")
     */
    public function showProfile()
    {   
        //Fonction qui affiche le profil d'un utilisateur

        return $this -> render('user/show_profile.html.twig', [
			
		 ]);
        
    }
    // test : localhost:8000/profile
    

     /**
     * @Route("/profile_update_{id}", name="profile_update")
     */
	//PROBLEME N AFFICHE PAS LE FORMULAIRE POUR FAIRE L UPDATE
    public function updateProfile(ObjectManager $manager, Request $request, $id)
    {   
        //Fonction qui modifie les infos d'un vendeur 
        //1 : Récupérer le vendeur connecté pour modifier son profil 
		$user = $manager->find(User::class,$id);
		
        // 2 : Traitement du formulaire 
        $form = $this -> createForm(UserType::class, $user);
	    $form -> handleRequest($request);
	   
	    if($form -> isSubmitted() && $form -> isValid()){
	   
		    $manager -> persist($user);
		    $manager -> flush(); 
		   
		    $this -> addFlash('success', 'Votre profil a bien été modifié !');
        	return $this -> redirectToRoute('profile');
		}
        //3 : Afficher la vue
        return $this -> render('user/user_form.html.twig', [
			'userForm' => $form->createView()
		]);
		
        
    }
    // test : localhost:8000/profile_update_3


    /**
     * @Route("/profile_delete{id}", name="profile_delete")
     */
    public function deleteProfile($id, ObjectManager $manager)//?????????????????????
    {   
        //Fonction qui supprime le profil d'un vendeur,
        //Récupérer l'id du vendeur actuellement connecté pour le supprimer 
        //Rajouter une condition de validation de suppression par l'admin 

		$user = $manager -> find(User::class, $id);
		
		if($user){
			$manager -> remove($user);
			$manager -> flush();
			
			$this -> addFlash('success',  'Votre profil a bien été supprimé !');
		}			
        //Affichage : redirection sur la page d'accueil
		return $this->render('/');
		
     
    }
    // test : localhost:8000/profile_delete3
    
	
}

