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
        $builder
<<<<<<< HEAD
        ->add('username')
        ->add('email')
        ->add('password')
        ->add('nom')
        ->add('prenom')
        ->add('dateNaissance')
        ->add('sexe')
        ->add('adresse')
=======
            -> add('username', TextType::class)
            -> add('email', EmailType::class)
            -> add('prenom', TextType::class)
            -> add('nom', TextType::class)
            -> add('sexe', ChoiceType::class, array(
				'choices' => array(
					'Homme' => 'm',
					'Femme' => 'f'
				),
				'invalid_message' => 'Choix invalide'
			))
            -> add('ville', TextType::class)
            -> add('codePostal', IntegerType::class)
            -> add('adresse', TextareaType::class)
            -> add('telephone', TextType::class)
            -> add('dateDeNaissance', BirthdayType::class)
			-> add('submit', SubmitType::class)
>>>>>>> c3ff98e8bd4c9d1eaffb1ff96c3e30e72f5f2f49
        ;
		
		
		if($options['admin'] == true){	
			$builder -> add('role', ChoiceType::class, array(
				'choices' => array(
					'Client' => 'ROLE_USER',
					'Admin' => 'ROLE_ADMIN',
					'Super Admin' => 'ROLE_SUPER_ADMIN'
				)
			));
		}
		else{
			if($options['update'] != true){
				$builder -> add('password', PasswordType::class);
			}
		}
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
			'attr' => array(
				'novalidate' => 'novalidate'
			),
			'admin' => false,
			'update' => false
        ]);
    }
}
