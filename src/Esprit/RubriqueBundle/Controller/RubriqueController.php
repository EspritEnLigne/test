<?php

namespace Esprit\RubriqueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esprit\RubriqueBundle\Entity\Rubrique;
use Esprit\RubriqueBundle\Form\RubriqueType;

/**
 * Rubrique controller.
 *
 */
class RubriqueController extends Controller
{
    /**
     * Lists all Rubrique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EspritRubriqueBundle:Rubrique')->findAll();

        return $this->render('EspritRubriqueBundle:Rubrique:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Rubrique entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Rubrique();
        $form = $this->createForm(new RubriqueType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rubrique_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritRubriqueBundle:Rubrique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Rubrique entity.
     *
     */
    public function newAction()
    {
        $entity = new Rubrique();
        $form   = $this->createForm(new RubriqueType(), $entity);

        return $this->render('EspritRubriqueBundle:Rubrique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rubrique entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Rubrique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubrique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritRubriqueBundle:Rubrique:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Rubrique entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Rubrique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubrique entity.');
        }

        $editForm = $this->createForm(new RubriqueType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritRubriqueBundle:Rubrique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Rubrique entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Rubrique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubrique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RubriqueType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rubrique_edit', array('id' => $id)));
        }

        return $this->render('EspritRubriqueBundle:Rubrique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rubrique entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritRubriqueBundle:Rubrique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rubrique entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rubrique'));
    }

    /**
     * Creates a form to delete a Rubrique entity by id.
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
