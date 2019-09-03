<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		// ERREUR REQUETE SQL sur id_boutique qui ne peut être null
		//SOLUTION mettre une valeur id_boutique en dur dans la BDD 
		$builder
			->add('username', TextType::class)
			->add('password', PasswordType::class)  
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
			->add('departement', TextType::class)
			->add('region', TextType::class)
			->add('telephone', TextType::class)
			->add('dateDeNaissance', BirthdayType::class)
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
