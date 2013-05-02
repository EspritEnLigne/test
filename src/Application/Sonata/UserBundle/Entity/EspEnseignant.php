<?php

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EspEnseignant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Application\Sonata\UserBundle\Entity\EspEnseignantRepository")
 */
class EspEnseignant
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
     * @ORM\Column(name="id_ens", type="string", length=10)
     */
    private $idEns;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ens", type="string", length=30)
     */
    private $nomEns;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ens", type="string", length=1)
     */
    private $typeEns;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rec", type="date")
     */
    private $dateRec;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=2)
     */
    private $niveau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_saisie", type="date")
     */
    private $dateSaisie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_dern_modif", type="date")
     */
    private $dateDernModif;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=1)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=300)
     */
    private $observation;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd_ens", type="string", length=10)
     */
    private $pwdEns;


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
     * Set idEns
     *
     * @param string $idEns
     * @return EspEnseignant
     */
    public function setIdEns($idEns)
    {
        $this->idEns = $idEns;
    
        return $this;
    }

    /**
     * Get idEns
     *
     * @return string 
     */
    public function getIdEns()
    {
        return $this->idEns;
    }

    /**
     * Set nomEns
     *
     * @param string $nomEns
     * @return EspEnseignant
     */
    public function setNomEns($nomEns)
    {
        $this->nomEns = $nomEns;
    
        return $this;
    }

    /**
     * Get nomEns
     *
     * @return string 
     */
    public function getNomEns()
    {
        return $this->nomEns;
    }

    /**
     * Set typeEns
     *
     * @param string $typeEns
     * @return EspEnseignant
     */
    public function setTypeEns($typeEns)
    {
        $this->typeEns = $typeEns;
    
        return $this;
    }

    /**
     * Get typeEns
     *
     * @return string 
     */
    public function getTypeEns()
    {
        return $this->typeEns;
    }

    /**
     * Set dateRec
     *
     * @param \DateTime $dateRec
     * @return EspEnseignant
     */
    public function setDateRec($dateRec)
    {
        $this->dateRec = $dateRec;
    
        return $this;
    }

    /**
     * Get dateRec
     *
     * @return \DateTime 
     */
    public function getDateRec()
    {
        return $this->dateRec;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     * @return EspEnseignant
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    
        return $this;
    }

    /**
     * Get niveau
     *
     * @return string 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set dateSaisie
     *
     * @param \DateTime $dateSaisie
     * @return EspEnseignant
     */
    public function setDateSaisie($dateSaisie)
    {
        $this->dateSaisie = $dateSaisie;
    
        return $this;
    }

    /**
     * Get dateSaisie
     *
     * @return \DateTime 
     */
    public function getDateSaisie()
    {
        return $this->dateSaisie;
    }

    /**
     * Set dateDernModif
     *
     * @param \DateTime $dateDernModif
     * @return EspEnseignant
     */
    public function setDateDernModif($dateDernModif)
    {
        $this->dateDernModif = $dateDernModif;
    
        return $this;
    }

    /**
     * Get dateDernModif
     *
     * @return \DateTime 
     */
    public function getDateDernModif()
    {
        return $this->dateDernModif;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return EspEnseignant
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set observation
     *
     * @param string $observation
     * @return EspEnseignant
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
    
        return $this;
    }

    /**
     * Get observation
     *
     * @return string 
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set pwdEns
     *
     * @param string $pwdEns
     * @return EspEnseignant
     */
    public function setPwdEns($pwdEns)
    {
        $this->pwdEns = $pwdEns;
    
        return $this;
    }

    /**
     * Get pwdEns
     *
     * @return string 
     */
    public function getPwdEns()
    {
        return $this->pwdEns;
    }
}
