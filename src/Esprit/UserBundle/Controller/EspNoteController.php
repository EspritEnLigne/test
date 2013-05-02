<?php

namespace Esprit\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Esprit\UserBundle\Entity\EspNote;
use Esprit\UserBundle\Form\EspNoteType;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * EspNote controller.
 *
 */
class EspNoteController extends Controller
{
    /**
     * Lists all EspNote entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EspritUserBundle:EspNote')->findAll();

        return $this->render('EspritUserBundle:EspNote:index.html.twig', array(
            'entities' => $entities,
        ));
    }
public function  noteAction(){
    $stmt = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare('SELECT * FROM V_NOTE');
        $stmt->execute();
        $result = $stmt->fetchAll();
    return $this->render('EspritUserBundle:EspNote:show.html.twig', array(
            'result' => $result,
        ));
    
}

    /**
     * Creates a new EspNote entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new EspNote();
        $form = $this->createForm(new EspNoteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('espnote_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritUserBundle:EspNote:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new EspNote entity.
     *
     */
    public function newAction()
    {
        $entity = new EspNote();
        $form   = $this->createForm(new EspNoteType(), $entity);

        return $this->render('EspritUserBundle:EspNote:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EspNote entity.
     *
     */
    /**
    * @Secure(roles="ROLE_ETUDIANT")
    */
    public function showAction()
    {
         $stmt = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare('SELECT * FROM V_NOTE');
        $stmt->execute();
        $result = $stmt->fetchAll();
    return $this->render('EspritUserBundle:EspNote:show.html.twig', array(
            'result' => $result,
        ));
    }

    /**
     * Displays a form to edit an existing EspNote entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:EspNote')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspNote entity.');
        }

        $editForm = $this->createForm(new EspNoteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritUserBundle:EspNote:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing EspNote entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritUserBundle:EspNote')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EspNote entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EspNoteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('espnote_edit', array('id' => $id)));
        }

        return $this->render('EspritUserBundle:EspNote:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EspNote entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritUserBundle:EspNote')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EspNote entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('espnote'));
    }

    /**
     * Creates a form to delete a EspNote entity by id.
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
