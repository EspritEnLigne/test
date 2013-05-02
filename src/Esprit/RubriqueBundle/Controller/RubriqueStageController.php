<?php

namespace Esprit\RubriqueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esprit\RubriqueBundle\Entity\RubriqueStage;
use Esprit\RubriqueBundle\Form\RubriqueStageType;

/**
 * RubriqueStage controller.
 *
 */
class RubriqueStageController extends Controller
{
    /**
     * Lists all RubriqueStage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->findAll();

        return $this->render('EspritRubriqueBundle:RubriqueStage:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new RubriqueStage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new RubriqueStage();
        $form = $this->createForm(new RubriqueStageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rubriquestage_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritRubriqueBundle:RubriqueStage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new RubriqueStage entity.
     *
     */
    public function newAction()
    {
        $entity = new RubriqueStage();
        $form   = $this->createForm(new RubriqueStageType(), $entity);

        return $this->render('EspritRubriqueBundle:RubriqueStage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RubriqueStage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RubriqueStage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritRubriqueBundle:RubriqueStage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing RubriqueStage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RubriqueStage entity.');
        }

        $editForm = $this->createForm(new RubriqueStageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritRubriqueBundle:RubriqueStage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing RubriqueStage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RubriqueStage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RubriqueStageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rubriquestage_edit', array('id' => $id)));
        }

        return $this->render('EspritRubriqueBundle:RubriqueStage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RubriqueStage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritRubriqueBundle:RubriqueStage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RubriqueStage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rubriquestage'));
    }

    /**
     * Creates a form to delete a RubriqueStage entity by id.
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
