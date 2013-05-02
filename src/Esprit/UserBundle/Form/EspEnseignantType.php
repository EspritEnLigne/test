<?php

namespace Esprit\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EspEnseignantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEns')
            ->add('nomEns')
            ->add('typeEns')
            ->add('dateRec')
            ->add('niveau')
            ->add('dateSaisie')
            ->add('dateDernModif')
            ->add('etat')
            ->add('observation')
            ->add('pwdEns')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\UserBundle\Entity\EspEnseignant'
        ));
    }

    public function getName()
    {
        return 'esprit_userbundle_espenseignanttype';
    }
}
