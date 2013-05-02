<?php

namespace Esprit\RubriqueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Esprit\RubriqueBundle\Entity\Document;
use Esprit\RubriqueBundle\Form\DocumentType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Document controller.
 *
 */
class DocumentController extends Controller {

    /**
     * Lists all Document entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EspritRubriqueBundle:Document')->findAll();

        return $this->render('EspritRubriqueBundle:Document:index.html.twig', array(
                    'entities' => $entities,
                ));
    }

    /**
     * Creates a new Document entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Document();
        $form = $this->createForm(new DocumentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('document_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritRubriqueBundle:Document:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Displays a form to create a new Document entity.
     *
     */
    public function newAction() {
        $entity = new Document();
        $form = $this->createForm(new DocumentType(), $entity);

        return $this->render('EspritRubriqueBundle:Document:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Finds and displays a Document entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritRubriqueBundle:Document:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Document entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $editForm = $this->createForm(new DocumentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritRubriqueBundle:Document:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing Document entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritRubriqueBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DocumentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('document_edit', array('id' => $id)));
        }

        return $this->render('EspritRubriqueBundle:Document:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a Document entity.
     *
     */
    public function deleteAction($id) {
//        $form = $this->createDeleteForm($id);
//        $form->bind($request);
//        if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EspritRubriqueBundle:Document')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Document entity.');
        }

        $em->remove($entity);
        $em->flush();
        //      }

        return $this->redirect($this->generateUrl('document'));
    }

    /**
     * Creates a form to delete a Document entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    public function fileAction($path) {
        $str = 'C:\\wamp\\www\\enligne\\web\\uploads\\documents\\';
        $file = new \Symfony\Component\HttpFoundation\File\File($str . $path);
        $data = $file->openFile('r');
        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent(readfile($file));
        $response->headers->set('Content-Type', 'mime/type');
        $response->headers->set('Content-Length', $file->getSize());
        $response->headers->set('Content-Disposition', sprintf('filename="%s"', $file->getBasename()));
        $response->sendHeaders();
        $data->fpassthru();
        return $response;
    }

    public function readfileAction($path) {

        $str = 'C:\\wamp\\www\\PFE\\EOL\\web\\uploads\\documents\\';
        $file = new \Symfony\Component\HttpFoundation\File\File($str . $path);
//        $FichierClient = fopen ($file , "r");
//        $data="";
//  while (!feof($FichierClient))
//    {
//    $data.= fgets ($FichierClient, 4096);
//    echo "<BR>";
//    }
//  fclose ($FichierClient);
//  $data2= htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        $data = $file->openFile('r');
        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent($data);

//                $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('EspritRubriqueBundle:Document')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Document entity.');
//        }


        return $response;
    }

}
