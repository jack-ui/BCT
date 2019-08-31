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


		//On crée les boutiques
        for($i = 0; $i < 20; $i++){
			$boutique = new Boutique; 
			
			// localisation	siret	nom_boutique	livraison	paiement	photo	user_id

            
            $boutique -> setlocalisation($faker -> lastName);
			$boutique -> setPrenom($faker -> firstName('male'|'female'));	
            $boutique -> setSexe($faker -> randomElement(['f', 'm']));
            $boutique -> setAdresse($faker -> streetAddress);
            $boutique -> setEmail($faker -> freeEmail);
            $boutique -> setUsername($faker -> userName);
            $boutique -> setPassword($faker -> password);
			
		}

        
        //On crée les produits
		for($i = 0; $i < 50; $i++){
            $produit = new Produit; 
            
            //l'id est auto-incrémenté, pas besoin de le mettre
            $produit -> setNom($faker -> randomElement(['tomates', 'pommes', 'oeufs', 'pêches', 'lait de vache', 'courgettes', 'mirabelles', 'abricots', 'aubergines', 'tomates cerises']));
			$produit -> setCategorie($faker -> randomElement(['fruit', 'legume', 'oeuf', 'viande', 'produit laitier']));	
            $produit -> setUniteMesure($faker -> randomElement(['poids', 'unite']));
            $produit -> setStock($faker -> numberBetween($min = 5, $max = 150));
            $produit -> setPrix($faker -> numberBetween($min = 1, $max = 9) );
            $produit -> setSaisonnalite($faker -> randomElement(['printemps', 'été', 'automne', 'hiver']));
            $photo = $produit -> getNom() . '.jpg';
            $produit -> setPhoto($photo);


			
			$manager -> persist($produit);
        }
        
        //On crée les users
        for($i = 0; $i < 20; $i++){
            $user = new User; 
            
            $user -> setNom($faker -> lastName);
			$user -> setPrenom($faker -> firstName('male'|'female'));	
            $user -> setSexe($faker -> randomElement(['f', 'm']));
            $user -> setAdresse($faker -> streetAddress);
            $user -> setEmail($faker -> freeEmail);
            $user -> setUsername($faker -> userName);
            $user -> setPassword($faker -> password);
            $user -> setVille($faker -> city);
            $user -> setCodePostal($faker ->  numberBetween($min = 10000, $max = 94500));
            $user -> setTelephone($faker -> phoneNumber);
            $user -> setDateDeNaissance($faker -> dateTimeThisCentury($max = '1929-05-30 19:28:21'));
			$user -> setStatut($faker -> randomElement(['0', '1']));
            $user -> setRole('ROLE_USER');


			
			$manager -> persist($user);
		}
		
		//on crée les commandes

		$users = $manager -> getRepository(User::class)  -> findAll();
		
		foreach($users as $user){
			
			$nb = rand(1, 6);
			
			for($i = 0; $i < $nb; $i++){
				// $statutUser = getStatut($user); //on fait une condition pour que les acheteurs seuls aient des commandes
				// if($statutUser === 0) 
				// {
					$commande = new Commande; 
					$commande -> setMontant($faker -> randomFloat(2, 10, 50));
					$commande -> setDate($faker -> dateTimeThisYear($max = 'now'));
					$commande -> setEtat($faker -> randomElement(['confirmée', 'en cours', 'livrée']));
					// $commande -> setUserId($user -> getId()); 
					//  La rcherche de l'id de l'user bugue. A CORRIGER.
					$manager -> persist($commande);
				// }
			}
		}
		
		
		
		
		
		// toutes les commandes : 
		$commandes = $manager -> getRepository(Commande::class)  -> findAll();
		
		// tous les produits :
		$produits = $manager -> getRepository(Produit::class)  -> findAll();
		
		// nombre de produits  :  (pour cibler un produit existant)
		$nbProduits = count($produits);
		
		foreach($commandes as $commande){ //Pour chaque commande
			$nb = rand(1, 5); // nb de produits dans la commande au hasard
			
			for($i = 0; $i < $nb; $i++){ // pour chaque produit qu'on ajoute dans la commande
				
				$quantite = rand(1, 12); // Quantité au hasard
				$numero_produit = rand(0, $nbProduits -1); //Pour Choisir un des produits au hasard
				
				$pc = new ProduitCommande;  // On crée la relation Produit/commande du moins on enregistre dans la table ProduitCommande un produit pour une commande
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