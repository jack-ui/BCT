<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		// ERREUR REQUETE SQL sur id_boutique qui ne peut être null
		//SOLUTION mettre une valeur id_boutique en dur dans la BDD 
		$builder
			->add('username', TextType::class)
			->add('password', RepeatedType::class, [
			    'type' => PasswordType::class,
			    'invalid_message' => 'Les mots de passe ne sont pas identiques, veuillez recommencer.',
			    'options' => ['attr' => ['class' => 'password-field']],
			    'required' => true,
			    'first_options'  => ['label' => 'Mot de passe'],
			    'second_options' => ['label' => 'Confirmation du mot de passe'],
			]) 
			->add('email', EmailType::class)
			->add('prenom', TextType::class)
			->add('nom', TextType::class)
			->add('sexe', ChoiceType::class, array(
				'choices' => array(
					'Homme' => 'm',
					'Femme' => 'f'
				),
				'invalid_message' => 'Choix invalide'
			))
			->add('ville', TextType::class)
			->add('codePostal', IntegerType::class)
			->add('adresse', TextareaType::class)
			->add('departement', ChoiceType::class, array(
				'choices' => array(
								'Sélectionnez votre département' => '0',
									'75 - Paris' => '75',
									'77 - Seine-et-Marne' => '77',
									'78 - Yvelines' => '78',
				 	  				'91 - Essonne' => '91',
									'92 - Hauts-de-Seine' => '92',
									'93 - Seine-Saint-Denis' => '93',
									'94 - Val-de-Marne' => '94',
									'95 - Val-d\'Oise' => '95',
									),
          			  ))
			->add('region', ChoiceType::class, array(
				'choices' => array(
					  'Sélectionnez votre région' => '0',
				 	  'Auvergne-Rhône-Alpes' => 'ARA',
                      'Bourgogne-Franche-Comté' => 'BFC',
                      'Bretagne' => 'BRE',
                      'Centre-Val de Loire' => 'CVL',
                      'Corse' => 'COR',
                      'Grand Est' => 'GES',
                      'Hauts-de-France' => 'HDF',
                      'Île-de-France' => 'IDF',
                      'Normandie' => 'NOR',
                      'Nouvelle-Aquitaine' => 'NAQ',
                      'Occitanie' => 'OCC',
                      'Nouvelle-Aquitaine' => 'PDL',
                      'Provence-Alpes-Côte d\'Azur' => 'PAC',
									),
          			  ))
			->add('telephone', TextType::class)
			->add('dateDeNaissance', BirthdayType::class, array(
                'years' => range(1930, date('Y') - 16)
            ))
			->add('statut', ChoiceType::class, array(
				'choices' => array(
					'Acheteur' => '0',
					'Vendeur' => '1'
				),
				'invalid_message' => 'Choix invalide'
			))
			->add('submit', SubmitType::class);


		// if ($options['admin'] == true) {
		// 	$builder->add('role', ChoiceType::class, array(
		// 		'choices' => array(
		// 			'Client' => 'ROLE_USER',
		// 			'Admin' => 'ROLE_ADMIN',
					
		// 		)
		// 	));
		// } else {
		// 	if ($options['update'] != true) {
		// 		$builder->add('password', PasswordType::class);
		// 	}
		//  }
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => User::class,
			'attr' => array(
				'novalidate' => 'novalidate'
			),
			// 'admin' => false,
			'update' => true
		]);
	}
}
