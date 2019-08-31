<?php

namespace App\Form;

use App\Entity\Boutique;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoutiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('localisation', TextType::class)
            ->add('siret', TextType::class)
            ->add('nomBoutique', TextType::class)
            ->add('livraison', TextType::class)
            ->add('paiement', TextType::class)
            ->add('photo', TextType::class)
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
