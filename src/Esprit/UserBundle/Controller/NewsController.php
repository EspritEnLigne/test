<?php

namespace Esprit\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esprit\UserBundle\Entity\News;
use Esprit\UserBundle\Form\NewsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * News controller.
 *
 */
class NewsController extends Controller
{
    /**
     * Lists all News entities.
     *
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
 
     return $this->render('EspritUserBundle:News:index.html.twig',
                                                       array('pagerfanta' => $pagerfanta,    'entities' => $entities,));	

   
    }
    
    	/**
         * @Route("/list/{page}",
         * name="list",
         * requirements={"page" = "\d+"},
         * defaults={"page" = "1"}
         * )
         * @Template()
         *
         * @param int $page
         */
        public function listAction($page)
    {  $em = $this->getDoctrine()->getManager();

        $entites = $em->getRepository('EspritUserBundle:News')->findAll();
           
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
            ->setMaxPerPage(2)
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
 
     return $this->render('EspritUserBundle:News:index.html.twig',
                                                       array('pagerfanta' => $pagerfanta,    'entities' => $entities,));	

    }
    /**
     * Creates a new News entity.
     *
     * 
     */
    public function createAction(Request $request)
    {
        $entity  = new News();
        $form = $this->createForm(new NewsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('news_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritUserBundle:News:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new News entity.
     *
     * @Secure(roles="ROLE_COMMUNICATION")
     */
    public function newAction()
    {
        $entity = new News();
        $form   = $this->createForm(new NewsType(), $entity);

        return $this->render('EspritUserBundle:News:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a News entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritUserBundle:News:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Creates a new News entity.
     *
     * @Secure(roles="ROLE_COMMUNICATION")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $editForm = $this->createForm(new NewsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritUserBundle:News:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a new News entity.
     *
     * @Secure(roles="ROLE_COMMUNICATION")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new NewsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('news_edit', array('id' => $id)));
        }

        return $this->render('EspritUserBundle:News:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a new News entity.
     *
     * @Secure(roles="ROLE_COMMUNICATION")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritUserBundle:News')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find News entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('news'));
    }

    /**
     * Creates a form to delete a News entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
