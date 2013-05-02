<?php

namespace Esprit\RubriqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * DocumentStage
 *
 * @ORM\Table(name="ESP_DocumentStage")
 * @ORM\Entity(repositoryClass="Esprit\RubriqueBundle\Entity\DocumentStageRepository")
 */
class DocumentStage {

    /**
     * @ORM\ManyToOne(targetEntity="Esprit\RubriqueBundle\Entity\RubriqueStage", cascade={"persist"}, inversedBy="documentsStage")
     * @ORM\JoinColumn(name="rubriqueStage_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $rubriqueStage;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return DocumentStage
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return DocumentStage
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath() {
        return $this->path;
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/documents';
    }

    public function upload() {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité
        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $this->file->getClientOriginalName();

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }


    /**
     * Set rubriqueStage
     *
     * @param \Esprit\RubriqueBundle\Entity\RubriqueStage $rubriqueStage
     * @return DocumentStage
     */
    public function setRubriqueStage(\Esprit\RubriqueBundle\Entity\RubriqueStage $rubriqueStage = null)
    {
        $this->rubriqueStage = $rubriqueStage;
    
        return $this;
    }

    /**
     * Get rubriqueStage
     *
     * @return \Esprit\RubriqueBundle\Entity\RubriqueStage 
     */
    public function getRubriqueStage()
    {
        return $this->rubriqueStage;
    }
}