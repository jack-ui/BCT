<?php

namespace App\Form;

use App\Entity\Boutique;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert; 


class BoutiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siret', TextType::class)
            ->add('nomBoutique', TextType::class)
            ->add('description', TextType::class)
            ->add('livraison', ChoiceType::class, array(
				'choices' => array(
					'à emporter' => 'à emporter',
                    'point relais' => 'point relais',
                    'domicile' => 'domicile',
				),
            ))
            ->add('paiement', ChoiceType::class, array(
				'choices' => array(
					'CB' => 'CB',
                    'paypal' => 'paypal',
                    'espèces' => 'espèces',
				),
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
