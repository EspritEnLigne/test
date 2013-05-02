<?php

namespace Esprit\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name ="ESP_NEWS")
 * @ORM\Entity(repositoryClass="Esprit\UserBundle\Entity\NewsRepository")
 */
class News
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
     * @ORM\Column(name="NewsDate", type="date")
     */
    private $newsDate;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=60)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text")
     */
    private $article;


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
     * Set newsDate
     *
     * @param \DateTime $newsDate
     * @return News
     */
    public function setNewsDate($newsDate)
    {
        $this->newsDate = $newsDate;
    
        return $this;
    }

    /**
     * Get newsDate
     *
     * @return \DateTime 
     */
    public function getNewsDate()
    {
        return $this->newsDate;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return News
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return News
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set article
     *
     * @param string $article
     * @return News
     */
    public function setArticle($article)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return string 
     */
    public function getArticle()
    {
        return $this->article;
    }
}
