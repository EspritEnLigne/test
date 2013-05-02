<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
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
}
  
