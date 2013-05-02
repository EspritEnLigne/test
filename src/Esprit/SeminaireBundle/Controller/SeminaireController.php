<?php

namespace Esprit\SeminaireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esprit\SeminaireBundle\Entity\Seminaire;
use Esprit\SeminaireBundle\Form\SeminaireType;

/**
 * Seminaire controller.
 *
 */
class SeminaireController extends Controller
{
    /**
     * Lists all Seminaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $iduser = $this->get('security.context')->getToken()->getUser()->getIdentifiant();
$entities = $em->getRepository('EspritSeminaireBundle:Seminaire')->findAll();
        $seminaires = $em->getRepository('EspritSeminaireBundle:Seminaire')->getSeminaireLibre($iduser);
                foreach ($seminaires as $value) {
                    $res = $value;
                }

        return $this->render('EspritSeminaireBundle:Seminaire:index.html.twig', array(
            'entities' => $entities,'seminaires'=>$res['ID']
        ));
    }

    /**
     * Creates a new Seminaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Seminaire();
        $form = $this->createForm(new SeminaireType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('seminaire_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritSeminaireBundle:Seminaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Seminaire entity.
     *
     */
    public function newAction()
    {
        $entity = new Seminaire();
        $form   = $this->createForm(new SeminaireType(), $entity);

        return $this->render('EspritSeminaireBundle:Seminaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seminaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritSeminaireBundle:Seminaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seminaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritSeminaireBundle:Seminaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Seminaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritSeminaireBundle:Seminaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seminaire entity.');
        }

        $editForm = $this->createForm(new SeminaireType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritSeminaireBundle:Seminaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Seminaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritSeminaireBundle:Seminaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seminaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SeminaireType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('seminaire_edit', array('id' => $id)));
        }

        return $this->render('EspritSeminaireBundle:Seminaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Seminaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritSeminaireBundle:Seminaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Seminaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('seminaire'));
    }

    /**
     * Creates a form to delete a Seminaire entity by id.
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
