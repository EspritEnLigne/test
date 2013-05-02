<?php

namespace Esprit\RubriqueBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DocumentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DocumentRepository extends EntityRepository {

    public function getDocumentRub($idRub) {
        return $this->_em->createQuery('
        SELECT
            d
        FROM
            EspritRubriqueBundle:Document d
        WHERE
            d.rubrique = :rubrique_id
        ORDER BY
            d.id DESC
    ')->setParameter('rubrique_id', $idRub)
            ->getArrayResult();
    }
    

}