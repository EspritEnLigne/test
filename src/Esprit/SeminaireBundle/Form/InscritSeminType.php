<?php

namespace Esprit\SeminaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Esprit\SeminaireBundle\Entity;

class InscritSeminType extends AbstractType {
private $seminLib;
 
    public function __construct($seminLib)
    {
        $this->seminLib = $seminLib;
    }

    //$id = $this->get('security.context')->getToken()->getUser()->getTest();
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                //->add('dateInscrit')
                ->add('seminaire','choice', array(
                    'choices' => $this->seminLib, 'data' => 1
                    ))
                        //->add('mode_encaissement', 'choice', array(
//                        'choices' => $this->modeEncaissements, 'data' => 1))
//                        ,'entity', array(
//                    'class' => 'EspritSeminaireBundle:Seminaire',
//                'query_builder' => function($repository)use ($id) {
//                    return $repository->getSeminaireLibre('id')
//                        ->setParameter('id', $id)
//                            ;
//                },
//                        
//                        
//            'required' => false,
//            
//                        )
                        
                        
        //->add('etudiant')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Esprit\SeminaireBundle\Entity\InscritSemin',
            
        ));
    }

    public function getName() {
        return 'esprit_seminairebundle_inscritsemintype';
    }

}
