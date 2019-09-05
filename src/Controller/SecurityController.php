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
	public function login(AuthenticationUtils $auth)
	{

		$lastUsername = $auth->getLastUsername();
		// récupérer le username

		$error = $auth->getLastAuthenticationError();
		// récupérer les erreurs

		if (!empty($error)) {
			$this->addFlash('errors', 'Problème d\'identifiant !');
		}


		return $this->render('security/login.html.twig', [
			'lastUsername' => $lastUsername
		]);
	}

	/**
	 * @Route("/check_statut", name="check_statut")
	 *
	 */
	public function checkStatut()
	{

		$user = $this->getUser();
		if ($user) {
			$statutLogin = $user->getStatut();
			$adminLogin = $user->getRole();
			$statutShop = $user->getBoutiqueId();

			if ($adminLogin == 'ROLE_ADMIN') {
				return $this->redirectToRoute('admin');
			} elseif ($statutLogin == 1) {
				if ($statutShop  != NULL) {
					return $this->redirectToRoute('dashboard');
				} else {
					return $this->redirectToRoute('create_shop');
				}
			} else {
				return $this->redirectToRoute('search');
			}
		}
	}



	/**
	 * @Route("/logout", name="logout")
	 *
	 */
	public function logout()
	{ }

	/**
	 * @Route("/connexion_check", name="connexion_check")
	 *
	 */
	public function connexionCheck()
	{ }
}
