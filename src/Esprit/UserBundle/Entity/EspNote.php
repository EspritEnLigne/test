<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EspNote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Esprit\UserBundle\Entity\EspNoteRepository")
 */
class EspNote
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
     * @var float
     *
     * @ORM\Column(name="Tp", type="float")
     */
    private $tp;

    /**
     * @var float
     *
     * @ORM\Column(name="Cc", type="float")
     */
    private $cc;

    /**
     * @var float
     *
     * @ORM\Column(name="Ex", type="float")
     */
    private $ex;

    /**
     * @var string
     *
     * @ORM\Column(name="Matiere", type="string", length=255)
     */
    private $matiere;


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
     * Set tp
     *
     * @param float $tp
     * @return EspNote
     */
    public function setTp($tp)
    {
        $this->tp = $tp;
    
        return $this;
    }

    /**
     * Get tp
     *
     * @return float 
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * Set cc
     *
     * @param float $cc
     * @return EspNote
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
    
        return $this;
    }

    /**
     * Get cc
     *
     * @return float 
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set ex
     *
     * @param float $ex
     * @return EspNote
     */
    public function setEx($ex)
    {
        $this->ex = $ex;
    
        return $this;
    }

    /**
     * Get ex
     *
     * @return float 
     */
    public function getEx()
    {
        return $this->ex;
    }

    /**
     * Set matiere
     *
     * @param string $matiere
     * @return EspNote
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
}