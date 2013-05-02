<?php

namespace Esprit\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esprit\UserBundle\Entity\EspEnseignant;
use Esprit\UserBundle\Form\EspEnseignantType;

/**
 * EspEnseignant controller.
 *
 */
class EspEnseignantController extends Controller
{
    /**
     * Lists all EspEnseignant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EspritUserBundle:EspEnseignant')->findAll();

        return $this->render('EspritUserBundle:EspEnseignant:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new EspEnseignant entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new EspEnseignant();
        $form = $this->createForm(new EspEnseignantType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('espenseignant_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritUserBundle:EspEnseignant:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new EspEnseignant entity.
     *
     */
    public function newAction()
    {
        $entity = new EspEnseignant();
        $form   = $this->createForm(new EspEnseignantType(), $entity);

        return $this->render('EspritUserBundle:EspEnseignant:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EspEnseignant entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:EspEnseignant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspEnseignant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritUserBundle:EspEnseignant:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing EspEnseignant entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:EspEnseignant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspEnseignant entity.');
        }

        $editForm = $this->createForm(new EspEnseignantType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritUserBundle:EspEnseignant:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing EspEnseignant entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:EspEnseignant')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspEnseignant entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EspEnseignantType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('espenseignant_edit', array('id' => $id)));
        }

        return $this->render('EspritUserBundle:EspEnseignant:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EspEnseignant entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritUserBundle:EspEnseignant')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EspEnseignant entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('espenseignant'));
    }

    /**
     * Creates a form to delete a EspEnseignant entity by id.
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
