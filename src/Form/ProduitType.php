<?php

namespace App\Form;

use App\Entity\Produit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            // ->add('id', TextType::class, array(
            //     'constraints' => array(
            //         new Assert\NotBlank(array(
            //             'message' => 'Veuillez renseigner l\'Id',
            //         )),
            //     ),
            // ))


            ->add('nom', TextType::class, array(
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'Veuillez renseigner le nom',
                    )),
                ),
            ))
            ->add('description',TextType::class)
            ->add('categorie', ChoiceType::class, array(
				'choices' => array(
                    'Sélectionnez votre catégorie de produit' => '0',
				    'fruit' => 'fruit',
                    'légume' => 'legume',
                    'viande' => 'viande',
                    'produit laitier' => 'produit_laitier'
									),
          			  ))
            ->add('uniteMesure', ChoiceType::class, array(
				'choices' => array(
                    'Sélectionnez votre unité de mesure' => '0',
				    'poids' => 'poids',
                    'unite' => 'unité',
									),
                        ))
                        
            ->add('stock', IntegerType::class)


            ->add('prix', MoneyType::class, array(
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Veuillez renseigner un prix'
                ),
                'constraints' => array(
                    new Assert\NotBlank(array()),
                    new Assert\Type(array(
                        'type' => 'double',
                        'message' => 'Veuillez renseigner un prix au format numérique (ex: 10,50)',
                    )),
                ),
            ))


            ->add('saisonnalite', ChoiceType::class, array(
				'choices' => array(
                    'Sélectionnez la saison de votre produit' => '0',
                    'Eté' => 'Eté',
                    'Printemps' => 'Printemps',
                    'Automne' => 'Automne',
                    'Hiver' => 'Hiver'
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
                        'mimeTypesMessage' => 'Veuillez sélectionner une image PNG, JPG, JPEG ou GIF',
                    )),
                    new Assert\File(array(
                        'maxSize' => '2M',
                        'maxSizeMessage' => '>Veuillez sélectionner une image de 2Mo maximum'
                    )),
                ),
                'label' => 'Photo'
            ))

            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
