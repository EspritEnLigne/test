<?php

namespace Esprit\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EspEtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('nomEt')
            ->add('pnomEt')
            ->add('dateNaisEt')
            ->add('lieuNaisEt')
            ->add('natureEt')
            ->add('fonctionEt')
            ->add('adresseEt')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\UserBundle\Entity\EspEtudiant'
        ));
    }

    public function getName()
    {
        return 'esprit_userbundle_espetudianttype';
    }
}
