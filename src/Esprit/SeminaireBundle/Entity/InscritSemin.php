<?php

namespace Esprit\SeminaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Esprit\UserBundle\Entity\EspEtudiant;

/**
 * InscritSemin
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InscritSemin
{
    /**
     * @ORM\ManyToOne(targetEntity="Esprit\SeminaireBundle\Entity\Seminaire", cascade={"persist"}, inversedBy="inscriptions")
     * @ORM\JoinColumn(name="id_Sem", referencedColumnName="id", onDelete="CASCADE")
     */
    private $seminaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Esprit\UserBundle\Entity\EspEtudiant", cascade={"persist"}, inversedBy="inscriptions")
     * @ORM\JoinColumn(name="id_Et", referencedColumnName="id_et", onDelete="CASCADE")
     */
    private $etudiant;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateInscrit", type="datetime")
     */
    private $dateInscrit;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
//   public function __construct($etud)
//    {
//        $this->etudiant=$etud;
//    }

    /**
     * Set dateInscrit
     *
     * @param \DateTime $dateInscrit
     * @return InscritSemin
     */
    public function setDateInscrit($dateInscrit)
    {
        $this->dateInscrit = $dateInscrit;
    
        return $this;
    }
    
    public function __construct()
    {
        $this->dateInscrit=new \DateTime();
        
    }

    /**
     * Get dateInscrit
     *
     * @return \DateTime 
     */
    public function getDateInscrit()
    {
        return $this->dateInscrit;
    }

    /**
     * Set seminaire
     *
     * @param \Esprit\SeminaireBundle\Entity\Seminaire $seminaire
     * @return InscritSemin
     */
    public function setSeminaire(\Esprit\SeminaireBundle\Entity\Seminaire $seminaire = null)
    {
        $this->seminaire = $seminaire;
    
        return $this;
    }

    /**
     * Get seminaire
     *
     * @return \Esprit\SeminaireBundle\Entity\Seminaire 
     */
    public function getSeminaire()
    {
//        $id = $this->get('security.context')->getToken()->getUser()->getTest();
//        $stmt = $this->getEntityManager()
//                   ->getConnection()
//                   ->prepare('SELECT * FROM SEMINAIRE 
//                       WHERE ID NOT IN (SELECT ID_SEM FROM INSCRITSEMIN WHERE ID_ET=:id_et)
//                      ');
//      $stmt->bindValue('id_et', $id);
//      $stmt->execute();
//      $this->seminaire= $stmt->fetchAll();
        return $this->seminaire;
    }

    /**
     * Set etudiant
     *
     * @param \Esprit\UserBundle\Entity\EspEtudiant $etudiant
     * @return InscritSemin
     */
    public function setEtudiant(\Esprit\UserBundle\Entity\EspEtudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;
    
        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \Esprit\UserBundle\Entity\EspEtudiant 
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}