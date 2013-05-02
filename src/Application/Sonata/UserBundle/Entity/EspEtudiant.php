<?php

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EspEtudiant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Application\Sonata\UserBundle\Entity\EspEtudiantRepository")
 */
class EspEtudiant
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
     * @var string
     *
     * @ORM\Column(name="id_et", type="string", length=10)
     */
    private $idEt;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_et", type="string", length=30)
     */
    private $nomEt;

    /**
     * @var string
     *
     * @ORM\Column(name="pnom_et", type="string", length=30)
     */
    private $pnomEt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_nais_et", type="date")
     */
    private $dateNaisEt;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_nais_et", type="string", length=30)
     */
    private $lieuNaisEt;

    /**
     * @var string
     *
     * @ORM\Column(name="nature_et", type="string", length=2)
     */
    private $natureEt;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction_et", type="string", length=30)
     */
    private $fonctionEt;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_et", type="string", length=100)
     */
    private $adresseEt;


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
     * Set idEt
     *
     * @param string $idEt
     * @return EspEtudiant
     */
    public function setIdEt($idEt)
    {
        $this->idEt = $idEt;
    
        return $this;
    }

    /**
     * Get idEt
     *
     * @return string 
     */
    public function getIdEt()
    {
        return $this->idEt;
    }

    /**
     * Set nomEt
     *
     * @param string $nomEt
     * @return EspEtudiant
     */
    public function setNomEt($nomEt)
    {
        $this->nomEt = $nomEt;
    
        return $this;
    }

    /**
     * Get nomEt
     *
     * @return string 
     */
    public function getNomEt()
    {
        return $this->nomEt;
    }

    /**
     * Set pnomEt
     *
     * @param string $pnomEt
     * @return EspEtudiant
     */
    public function setPnomEt($pnomEt)
    {
        $this->pnomEt = $pnomEt;
    
        return $this;
    }

    /**
     * Get pnomEt
     *
     * @return string 
     */
    public function getPnomEt()
    {
        return $this->pnomEt;
    }

    /**
     * Set dateNaisEt
     *
     * @param \DateTime $dateNaisEt
     * @return EspEtudiant
     */
    public function setDateNaisEt($dateNaisEt)
    {
        $this->dateNaisEt = $dateNaisEt;
    
        return $this;
    }

    /**
     * Get dateNaisEt
     *
     * @return \DateTime 
     */
    public function getDateNaisEt()
    {
        return $this->dateNaisEt;
    }

    /**
     * Set lieuNaisEt
     *
     * @param string $lieuNaisEt
     * @return EspEtudiant
     */
    public function setLieuNaisEt($lieuNaisEt)
    {
        $this->lieuNaisEt = $lieuNaisEt;
    
        return $this;
    }

    /**
     * Get lieuNaisEt
     *
     * @return string 
     */
    public function getLieuNaisEt()
    {
        return $this->lieuNaisEt;
    }

    /**
     * Set natureEt
     *
     * @param string $natureEt
     * @return EspEtudiant
     */
    public function setNatureEt($natureEt)
    {
        $this->natureEt = $natureEt;
    
        return $this;
    }

    /**
     * Get natureEt
     *
     * @return string 
     */
    public function getNatureEt()
    {
        return $this->natureEt;
    }

    /**
     * Set fonctionEt
     *
     * @param string $fonctionEt
     * @return EspEtudiant
     */
    public function setFonctionEt($fonctionEt)
    {
        $this->fonctionEt = $fonctionEt;
    
        return $this;
    }

    /**
     * Get fonctionEt
     *
     * @return string 
     */
    public function getFonctionEt()
    {
        return $this->fonctionEt;
    }

    /**
     * Set adresseEt
     *
     * @param string $adresseEt
     * @return EspEtudiant
     */
    public function setAdresseEt($adresseEt)
    {
        $this->adresseEt = $adresseEt;
    
        return $this;
    }

    /**
     * Get adresseEt
     *
     * @return string 
     */
    public function getAdresseEt()
    {
        return $this->adresseEt;
    }
}
