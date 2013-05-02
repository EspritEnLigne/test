<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

use JMS\SecurityExtraBundle\Annotation\Secure;
class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction($page)
    {
       $em = $this->getDoctrine()->getManager();

        $entites = $em->getRepository('EspritUserBundle:News')->getNewsDec();
           
      //je récupère les articles à afficher 
      $adapter = new ArrayAdapter($entites); 
     /* j' utilise un         Adapter que je  vais  passer à pagerfanta*/
     $pagerfanta = new Pagerfanta($adapter); // j' instancie pagerfanta
//     $pagerfanta->setMaxPerPage(2);//je fixe le nombre d'articles par page à 5
//     $request = $this->get('request');
//     $page = $request->query->get('page',1);
     try
    {
        $entities = $pagerfanta
            // Le nombre maximum d'éléments par page
            ->setMaxPerPage(3)
            // Notre position actuelle (numéro de page)
            ->setCurrentPage($page)
            // On récupère nos entités via Pagerfanta,
            // celui-ci s'occupe de limiter la requête en fonction de nos réglages.
            ->getCurrentPageResults();
     }
     catch (\Pagerfanta\Exception\NotValidCurrentPageException $e)
    {
         $this->createNotFoundException();
     }
 
     return $this->render('AcmeDemoBundle:Welcome:index.html.twig',
                                                       array('pagerfanta' => $pagerfanta,    'entities' => $entities,));	

   
    }
public function menuAction()
    {
         $em = $this->getDoctrine()->getManager();

        $rubriques = $em->getRepository('EspritRubriqueBundle:Rubrique')->findAll();
        $rubriqueStage = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->findAll();
        return $this->render('AcmeDemoBundle::menu.html.twig', array('rubriques'=>$rubriques,
               'rubriqueStage'=>$rubriqueStage,
               'last_username' => null,
               'error'         => null
            ));
    }
    public function showMenuAction($id)
    {
         $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Rubrique')->find($id);
         $documents = $em->getRepository('EspritRubriqueBundle:Document')
                   ->getDocumentRub($entity->getId());
        return $this->render('AcmeDemoBundle::showMenu.html.twig', array('documents'=>$documents));
    }
    
        public function showMenuStageAction($id)
    {
         $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->find($id);
         $documentsStage = $em->getRepository('EspritRubriqueBundle:DocumentStage')
                   ->getDocumentRub($entity->getId());
        return $this->render('AcmeDemoBundle::showMenuStage.html.twig', array('documentsStage'=>$documentsStage));
    }

    /**
     * @Route("/hello/{name}", name="_demo_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/contact", name="_demo_contact")
     * @Template()
     */
    public function contactAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $mailer = $this->get('mailer');
                // .. setup a message and send it
                // http://symfony.com/doc/current/cookbook/email.html

                $this->get('session')->setFlash('notice', 'Message sent!');

                return new RedirectResponse($this->generateUrl('_demo'));
            }
        }

        return array('form' => $form->createView());
    }
}
