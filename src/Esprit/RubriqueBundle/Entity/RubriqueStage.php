<?php

namespace Esprit\RubriqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RubriqueStage
 *
 * @ORM\Table(name="ESP_RubriqueStage")
 * @ORM\Entity(repositoryClass="Esprit\RubriqueBundle\Entity\RubriqueStageRepository")
 */
class RubriqueStage {

    /**
     * @ORM\OneToMany(targetEntity="Esprit\RubriqueBundle\Entity\DocumentStage", mappedBy="rubriqueStage",cascade={"persist"})
     */
    private $documentsStage;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRub", type="date")
     */
    private $date;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return RubriqueStage
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return RubriqueStage
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateRub=new \DateTime();
        $this->documentsStage = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add documentsStage
     *
     * @param \Esprit\RubriqueBundle\Entity\DocumentStage $documentsStage
     * @return RubriqueStage
     */
    public function addDocumentsStage(\Esprit\RubriqueBundle\Entity\DocumentStage $documentsStage)
    {
        $this->documentsStage[] = $documentsStage;
    
        return $this;
    }

    /**
     * Remove documentsStage
     *
     * @param \Esprit\RubriqueBundle\Entity\DocumentStage $documentsStage
     */
    public function removeDocumentsStage(\Esprit\RubriqueBundle\Entity\DocumentStage $documentsStage)
    {
        $this->documentsStage->removeElement($documentsStage);
    }

    /**
     * Get documentsStage
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocumentsStage()
    {
        return $this->documentsStage;
    }
    
    public function __toString() {
        return $this->getTitre();
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return RubriqueStage
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}