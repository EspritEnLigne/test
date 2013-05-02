<?php

namespace Esprit\SeminaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seminaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Esprit\SeminaireBundle\Entity\SeminaireRepository")
 */
class Seminaire
{
     /**
     * @ORM\OneToMany(targetEntity="Esprit\SeminaireBundle\Entity\InscritSemin",mappedBy="seminaire",cascade={"persist"})
     */
    private $inscriptions;

    
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
     * @ORM\Column(name="Sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @var \DateTime
     * @ORM\Column(name="DateSem", type="datetime")
     */
    private $dateSem;


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
     * Set sujet
     *
     * @param string $sujet
     * @return Seminaire
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    
        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set dateSem
     *
     * @param \DateTime $dateSem
     * @return Seminaire
     */
    public function setDateSem($dateSem)
    {
        $this->dateSem = $dateSem;
    
        return $this;
    }

    /**
     * Get dateSem
     *
     * @return \DateTime 
     */
    public function getDateSem()
    {
        return $this->dateSem;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inscriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add inscriptions
     *
     * @param \Esprit\SeminaireBundle\Entity\InscritSemin $inscriptions
     * @return Seminaire
     */
    public function addInscription(\Esprit\SeminaireBundle\Entity\InscritSemin $inscriptions)
    {
        $this->inscriptions[] = $inscriptions;
    
        return $this;
    }

    /**
     * Remove inscriptions
     *
     * @param \Esprit\SeminaireBundle\Entity\InscritSemin $inscriptions
     */
    public function removeInscription(\Esprit\SeminaireBundle\Entity\InscritSemin $inscriptions)
    {
        $this->inscriptions->removeElement($inscriptions);
    }

    /**
     * Get inscriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }    
    
    public function __toString()
    {
        return $this->getSujet();
    }
}