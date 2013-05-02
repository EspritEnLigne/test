<?php

namespace Esprit\SeminaireBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Esprit\SeminaireBundle\Entity\InscritSemin;
use Esprit\SeminaireBundle\Form\InscritSeminType;
use Symfony\Component\HttpFoundation\Response;

/**
 * InscritSemin controller.
 *
 */
class InscritSeminController extends Controller {

    /**
     * Lists all InscritSemin entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EspritSeminaireBundle:InscritSemin')->findAll();
        //$user = $this->get('security.context')->getToken()->getUser()->getTest();
        $iduser = $this->get('security.context')->getToken()->getUser()->getIdentifiant();
        $etudiant = $em->getRepository('EspritUserBundle:EspEtudiant')
                ->getEtudiantCourant($iduser);



//$stmt = $this->getDoctrine()->getEntityManager()
//                    ->getConnection()
//                    ->prepare('SELECT * FROM V_SEMINAIRE');
////$req='SELECT * FROM V_SEMINAIRE';
//            $stmt->execute();
//            $result = $stmt->fetchAll();
//            foreach ($result as $value) {
//                $res=$value['ID_ET'];
//            }
        //,'result'=>$res
        //, 'iduser' => $etudiant[0]
        return $this->render('EspritSeminaireBundle:InscritSemin:index.html.twig', array(
                    'entities' => $entities, 'etudiant' => $etudiant[0]
                ));
    }

    /**
     * Creates a new InscritSemin entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new InscritSemin();
        $iduser = $this->get('security.context')->getToken()->getUser()->getIdentifiant();
        $stmt2 = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare('SELECT * FROM SEMINAIRE 
                        WHERE ID NOT IN (SELECT ID_SEM FROM INSCRITSEMIN WHERE ID_ET=:id_et)');
        //WHERE ID NOT IN (SELECT ID_SEM FROM INSCRITSEMIN WHERE ID_ET=:id_et)
        $stmt2->bindValue('id_et', $iduser);
        $stmt2->execute();
        $seminaireLibre = $stmt2->fetchAll();

        $form = $this->createForm(new InscritSeminType($seminaireLibre), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $etudiant = $em->getRepository('EspritUserBundle:EspEtudiant')
                    ->getEtudiantCourant($iduser);


            ////////etudiants inscrits dans les seminaires/////////
//            $stmt = $this->getDoctrine()->getEntityManager()
//                    ->getConnection()
//                    ->prepare('SELECT * FROM V_SEMINAIRE WHERE ID_ET=:id_et');
//            $stmt->bindValue('id_et', $iduser);
//            $stmt->execute();
//            $result1 = $stmt->fetchAll();
//            ////////////seminaires libres par rapport à l'étudiant connecté///////////
//            $stmt2 = $this->getDoctrine()->getEntityManager()
//                    ->getConnection()
//                    ->prepare('SELECT * FROM SEMINAIRE 
//                        WHERE ID NOT IN (SELECT ID_SEM FROM V_SEMINAIRE WHERE ID_ET=:id_et)');
//            //WHERE ID NOT IN (SELECT ID_SEM FROM INSCRITSEMIN WHERE ID_ET=:id_et)
//            $stmt2->bindValue('id_et', $iduser);
//            $stmt2->execute();
//            $result2 = $stmt2->fetchAll();
//
//            foreach ($result2 as $value) {
//
//                $seminLibre = $value['ID'];
//            }
//
//
//            foreach ($result1 as $value) {
//                //$etud = $value['ID_ET'];
//                $semin = $value['ID_SEM'];
//            }
//            if (!$result1) {
//                $entity->setEtudiant($etudiant[0]);
//                $em->persist($entity);
//                $em->flush();
//            } else {
//
//                if (!$result2) {
//                    return new Response('etudiant déja inscrit');
//                } else {
//                    $entity->setEtudiant($etudiant[0]);
//                    $em->persist($entity);
//                    $em->flush();
//                }
//            }
                $entity->setEtudiant($etudiant[0]);
                    $em->persist($entity);
                    $em->flush();


            return $this->redirect($this->generateUrl('inscritsemin_show', array('id' => $entity->getId())));
        }

        return $this->render('EspritSeminaireBundle:InscritSemin:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Displays a form to create a new InscritSemin entity.
     *
     */
    public function newAction() {
        //$arraySemin=new array();

        $entity = new InscritSemin();
        //$em = $this->getDoctrine()->getManager();
        $iduser = $this->get('security.context')->getToken()->getUser()->getIdentifiant();
        $stmt2 = $this->getDoctrine()->getEntityManager()
                ->getConnection()
                ->prepare('SELECT * FROM SEMINAIRE 
                        WHERE ID NOT IN (SELECT ID_SEM FROM INSCRITSEMIN WHERE ID_ET=:id_et)');
        //WHERE ID NOT IN (SELECT ID_SEM FROM INSCRITSEMIN WHERE ID_ET=:id_et)
        $stmt2->bindValue('id_et', $iduser);
        $stmt2->execute();
        $seminaireLibre = $stmt2->fetchAll();

        $form = $this->createForm(new InscritSeminType($seminaireLibre), $entity);



        return $this->render('EspritSeminaireBundle:InscritSemin:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Finds and displays a InscritSemin entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritSeminaireBundle:InscritSemin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InscritSemin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritSeminaireBundle:InscritSemin:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing InscritSemin entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritSeminaireBundle:InscritSemin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InscritSemin entity.');
        }

        $editForm = $this->createForm(new InscritSeminType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EspritSeminaireBundle:InscritSemin:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing InscritSemin entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EspritSeminaireBundle:InscritSemin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InscritSemin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new InscritSeminType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('inscritsemin_edit', array('id' => $id)));
        }

        return $this->render('EspritSeminaireBundle:InscritSemin:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a InscritSemin entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EspritSeminaireBundle:InscritSemin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InscritSemin entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('inscritsemin'));
    }

    /**
     * Creates a form to delete a InscritSemin entity by id.
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

    private function createNewForm($seminaire) {
        return $this->createFormBuilder(array('seminaire' => $seminaire))
                        ->add('seminaire', 'hidden')
                        ->getForm()
        ;
    }

}
