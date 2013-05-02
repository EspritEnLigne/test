<?php

namespace Esprit\RubriqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rubrique
 *
 * @ORM\Table(name="esp_rubrique")
 * @ORM\Entity(repositoryClass="Esprit\RubriqueBundle\Entity\RubriqueRepository")
 */
class Rubrique
{
    /**
     * @ORM\OneToMany(targetEntity="Esprit\RubriqueBundle\Entity\Document",
      mappedBy="rubrique",cascade={"persist"})
     */
    private $documents;
    
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
    private $dateRub;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Rubrique
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Rubrique
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    
    
    public function __toString() {
        return $this->getTitre();
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function setDocuments($documents)
    {
        $this->documents=$documents;
    }
    
    /**
     * Add documents
     *
     * @param \Esprit\RubriqueBundle\Entity\Document $documents
     * @return Rubrique
     */
    public function addDocument(\Esprit\RubriqueBundle\Entity\Document $document)
    {        
        $this->documents[] = $document;
        return $this;
    }

    /**
     * Remove documents
     *
     * @param \Esprit\RubriqueBundle\Entity\Document $documents
     */
    public function removeDocument(\Esprit\RubriqueBundle\Entity\Document $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }


    /**
     * Set dateRub
     *
     * @param \DateTime $dateRub
     * @return Rubrique
     */
    public function setDateRub($dateRub)
    {
        $this->dateRub = $dateRub;
    
        return $this;
    }

    /**
     * Get dateRub
     *
     * @return \DateTime 
     */
    public function getDateRub()
    {
        return $this->dateRub;
    }
}