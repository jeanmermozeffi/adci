<?php

namespace App\Form;

use App\Entity\Adhesion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdhesionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adhereADCI')
            ->add('zone')
            ->add('nomEtPrenoms')
            ->add('dateDeNaissance')
            ->add('lieuDeNaissance')
            ->add('inscritSurListeElectorale')
            ->add('lieuDeVote')
            ->add('numeroCarteElecteur')
            ->add('lieuDeResidenceActuelle')
            ->add('departement')
            ->add('region')
            ->add('naturePieceIdentite')
            ->add('numeroPieceIdentite')
            ->add('numeroExtraitActeNaissance')
            ->add('profession')
            ->add('contactsCellulaires')
            ->add('adresseElectronique')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adhesion::class,
        ]);
    }
}
