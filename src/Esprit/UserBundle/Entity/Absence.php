<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="Esp_Absence")
 * @ORM\Entity(repositoryClass="Esprit\UserBundle\Entity\AbsenceRepository")
 */
class Absence
{
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
     * @ORM\Column(name="dateabsence", type="date")
     */
    private $dateabsence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureabsence", type="time")
     */
    private $heureabsence;

    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", length=255)
     */
    private $matiere;

    /**
     * @var string
     *
     * @ORM\Column(name="enseignant", type="string", length=255)
     */
    private $enseignant;


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
     * Set dateabsence
     *
     * @param \DateTime $dateabsence
     * @return Absence
     */
    public function setDateabsence($dateabsence)
    {
        $this->dateabsence = $dateabsence;
    
        return $this;
    }

    /**
     * Get dateabsence
     *
     * @return \DateTime 
     */
    public function getDateabsence()
    {
        return $this->dateabsence;
    }

    /**
     * Set heureabsence
     *
     * @param \DateTime $heureabsence
     * @return Absence
     */
    public function setHeureabsence($heureabsence)
    {
        $this->heureabsence = $heureabsence;
    
        return $this;
    }

    /**
     * Get heureabsence
     *
     * @return \DateTime 
     */
    public function getHeureabsence()
    {
        return $this->heureabsence;
    }

    /**
     * Set matiere
     *
     * @param string $matiere
     * @return Absence
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    
        return $this;
    }

    /**
     * Get matiere
     *
     * @return string 
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set enseignant
     *
     * @param string $enseignant
     * @return Absence
     */
    public function setEnseignant($enseignant)
    {
        $this->enseignant = $enseignant;
    
        return $this;
    }

    /**
     * Get enseignant
     *
     * @return string 
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }
}