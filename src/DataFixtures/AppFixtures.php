<?php

namespace App\DataFixtures;

use App\Entity\Boutique;
use Faker; 
use App\Entity\User; 
use App\Entity\Produit; 
use App\Entity\Commande; 
use App\Entity\ProduitCommande; 

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
	

    public function load(ObjectManager $manager)
    {
		
		// on récupère un objet FAKER en français. 
		$faker = Faker\Factory::create('fr_FR');


	
	//On crée les users  //MIS EN COMMENTAIRE UNE FOIS CREES pour l'utilisation de la mémoire
	// for($i = 0; $i < 70; $i++){
	// 	$user = new User; 
		
	// 	$user -> setNom($faker -> lastName);
	// 	$user -> setPrenom($faker -> firstName('male'|'female'));	
	// 	$user -> setSexe($faker -> randomElement(['f', 'm']));
	// 	$user -> setAdresse($faker -> streetAddress);
	// 	$user -> setEmail($faker -> freeEmail);
	// 	$user -> setUsername($faker -> userName);
	// 	$user -> setPassword($faker -> password);
	// 	$user -> setVille($faker -> city);
	// 	$user -> setCodePostal($faker ->  numberBetween($min = 10000, $max = 94500));
	// 	$user -> setTelephone($faker -> phoneNumber);
	// 	$user -> setDateDeNaissance($faker -> dateTimeThisCentury($max = '1929-05-30 19:28:21'));
	// 	$user -> setStatut($faker -> randomElement(['0', '1']));
	// 	$user -> setRole('ROLE_USER');


		
	// 	$manager -> persist($user);
	// }



	//On crée les boutiques
	// $users = $manager -> getRepository(User::class)  -> findAll();
		
	// foreach($users as $user)
	// {
		
		// for($i = 0; $i < 30; $i++)
		// {
			// $nbUsers = count($users);
			// for($i = 0; $i < $nbUsers; $i++)
			// {
				// $statutUser = $user -> getStatut(); //on fait une condition pour que les vendeurs seuls aient des boutiques
				// if($statutUser === 1) 
				// {
			
					// $boutique = new Boutique;
					// $boutique -> setSiret($faker -> numberBetween($min = 10000000, $max = 99999999));
					// $boutique -> setNomBoutique($faker -> company); //A modifier ??	
					// $boutique -> setLivraison($faker -> randomElement(['à emporter', 'point relais', 'a domicile']));
					// $boutique -> setPaiement($faker -> randomElement(['carte bleue', 'espèces', 'paypal']));
					// $photoBoutique = $boutique -> getNomBoutique() . '.jpg';
					// $boutique -> setPhoto($photoBoutique);
					// // $boutique -> setUserId($faker -> userName); //voir s'il faut être dans un foreach user pour le récupérer
					// $boutique -> setVille($faker -> city);
					// $boutique -> setCodePostal($faker -> numberBetween($min = 10000, $max = 94500));
					// $boutique -> setAdresse($faker -> streetAddress);
					// $boutique -> setTelephone($faker -> phoneNumber);
					

					// $manager -> persist($boutique);

				// }
			// }
			
		// }

	// }

        
		//On crée les produits
		
		// $boutiques = $manager -> getRepository(Boutique::class)  -> findAll();


		// foreach($boutiques as $boutique)
		
		// {
		// 	$nb1 = rand(1, 4);

		// 	for($i = 0; $i < $nb1; $i++)
		// 	{
		// 		$produit = new Produit; 
				
		// 		//l'id est auto-incrémenté, pas besoin de le mettre
		// 		$produit -> setNom($faker -> randomElement(['tomates', 'pommes', 'oeufs', 'pêches', 'lait de vache', 'courgettes', 'mirabelles', 'abricots', 'aubergines', 'tomates cerises']));
		// 		$produit -> setCategorie($faker -> randomElement(['fruit', 'legume', 'oeuf', 'viande', 'produit laitier']));	
		// 		$produit -> setUniteMesure($faker -> randomElement(['poids', 'unite']));
		// 		$produit -> setStock($faker -> numberBetween($min = 5, $max = 25));
		// 		$produit -> setPrix($faker -> numberBetween($min = 1, $max = 9) );
		// 		$produit -> setSaisonnalite($faker -> randomElement(['printemps', 'été', 'automne', 'hiver']));
		// 		$photoProduit = $produit -> getNom() . '.jpg';
		// 		$produit -> setPhoto($photoProduit);
		// 		$descriptionProduit = 'Les meilleur(e)s ' . $produit -> getNom() . ' de la région !';
		// 		$produit -> setDescription($descriptionProduit);
		// 		// $produit -> setBoutiqueId($boutique -> getId());
			
			
		// 	$manager -> persist($produit);
		// 	}
		// }


			
		
		
		// //on crée les commandes

		// $users = $manager -> getRepository(User::class)  -> findAll();

		// foreach($users as $user)
		// {
		// 	$nb = rand(1, 4);
			
		// 	for($i = 0; $i < $nb; $i++){
		// 		$commande = new Commande; 
		// 		// $commande -> setUserId($user -> getId());
		// 		$commande -> setMontant($faker -> randomFloat(2, 10, 50));
		// 		$commande -> setDate($faker -> dateTimeThisMonth($max = 'now'));
		// 		$commande -> setEtat($faker -> randomElement(['confirmée', 'en préparation', 'livrée']));
				
		// 		$manager -> persist($commande);
		// 	}
		// }


		// toutes les commandes : 
		$commandes = $manager -> getRepository(Commande::class)  -> findAll();
		
		// tous les produits :
		$produits = $manager -> getRepository(Produit::class)  -> findAll();
		
			
		// nombre de produits  :  (pour cibler un produit existant)
		$nbProduits = count($produits);
				
		foreach($commandes as $commande){ //Pour chaque commande
			$nb = rand(1, 3); // nb de produit dans la commande au hasard
			
			for($i = 0; $i < $nb; $i++)
			{ // pour chaque produit qu'on ajoute dans la commande
				
				$quantite = rand(1, 8); // Quantité au hasard
				$numero_produit = rand(0, $nbProduits -1); //Pour Choisir un des produits au hasard
				
				$pc = new ProduitCommande;  // On créer la relation Produit/commande du moins on enregistre dans la table ProduitCommande un produit pour une commande
				$pc -> setQuantite($quantite); 
				$pc -> setProduit($produits[$numero_produit]); // le produit choisi au hasard (objet)
				$pc -> setCommande($commande); // la commande en cours dans la boucle (objet)
				
				$manager -> persist($pc);
			}
		}
		
		
		
        $manager->flush();
	
	}
}


// php bin/console doctrine:fixtures:load --append