<?php

namespace App\Form;

use App\Entity\Boutique;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert; 


class BoutiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('localisation', TextType::class)
            ->add('siret', TextType::class)
            ->add('nomBoutique', TextType::class)
            ->add('livraison', ChoiceType::class, array(
				'choices' => array(
					'à emporter' => '0',
                    'point relais' => '1',
                    'domicile' => '2',
				),
			))
            ->add('paiement', ChoiceType::class, array(
				'choices' => array(
					'CB' => '0',
                    'paypal' => '1',
                    'espèces' => '2',
				),
            ))
            




            ->add('file', FileType::class, array(
				'constraints' => array(
					new Assert\Image(array(
						'mimeTypes' => array(
							'image/png',
							'image/jpeg',
							'image/jpg',
							'image/gif'
						),
						'mimeTypesMessage' => 'Veuillez sélectionner une image PNG, JPG, JPEG ou GIF' ,
					)),
					new Assert\File(array(
						'maxSize' => '2M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 2Mo maximum'
					)),
				), 
				'label' => 'Photo'
			))







            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Boutique::class,
        ]);
    }
}
