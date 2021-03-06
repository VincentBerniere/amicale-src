<?php

namespace AGIL\HallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AgilPhoto
 *
 * @ORM\Table(name="agil_photo")
 * @ORM\Entity(repositoryClass="AGIL\HallBundle\Repository\AgilPhotoRepository")
 */
class AgilPhoto
{
    /**
     * @ORM\ManyToOne(targetEntity="AGIL\HallBundle\Entity\AgilEvent", inversedBy="photos")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="eventId")
     */
    private $event;

    /**
     * @var int
     *
     * @ORM\Column(name="photoId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $photoId;

    /**
     * @var string
     *
     * @ORM\Column(name="photoUrl", type="string", length=255)
     */
    private $photoUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="photoUploadDate", type="datetime")
     */
    private $photoUploadDate;

    /**
     * @var string
     *
     * @ORM\Column(name="photoDescription", type="text", nullable=true)
     *
     * @Assert\NotBlank(message="La photo doit contenir une description")
     * @Assert\Length(
     *      min = 2,
     *      minMessage = "La taille minimale est de {{ limit }} caractères"
     * )
     */
    private $photoDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="photoTitle", type="string", length=100)
     * @Assert\NotBlank(message="La photo doit contenir un titre")
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "La taille minimale est de {{ limit }} caractères",
     *      maxMessage = "La taille maximale est de {{ limit }} caractères"
     * )
     */
    private $photoTitle;

    /**
     * AgilPhoto constructor.
     */
    public function __construct()
    {
        $this->photoUploadDate = new \Datetime();
    }

    /**
     * Get photoId
     *
     * @return integer 
     */
    public function getPhotoId()
    {
        return $this->photoId;
    }

    /**
     * Set photoUrl
     *
     * @param string $photoUrl
     * @return AgilPhoto
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    /**
     * Get photoUrl
     *
     * @return string 
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * Set photoUploadDate
     *
     * @param \DateTime $photoUploadDate
     * @return AgilPhoto
     */
    public function setPhotoUploadDate($photoUploadDate)
    {
        $this->photoUploadDate = $photoUploadDate;

        return $this;
    }

    /**
     * Get photoUploadDate
     *
     * @return \DateTime 
     */
    public function getPhotoUploadDate()
    {
        return $this->photoUploadDate;
    }

    /**
     * Set photoDescription
     *
     * @param string $photoDescription
     * @return AgilPhoto
     */
    public function setPhotoDescription($photoDescription)
    {
        $this->photoDescription = $photoDescription;

        return $this;
    }

    /**
     * Get photoDescription
     *
     * @return string 
     */
    public function getPhotoDescription()
    {
        return $this->photoDescription;
    }

    /**
     * Set photoTitle
     *
     * @param string $photoTitle
     * @return AgilPhoto
     */
    public function setPhotoTitle($photoTitle)
    {
        $this->photoTitle = $photoTitle;

        return $this;
    }

    /**
     * Get photoTitle
     *
     * @return string 
     */
    public function getPhotoTitle()
    {
        return $this->photoTitle;
    }

    public function getEvent() {
        return $this->event;
    }

    public function setEvent($event) {
        $this->event = $event;

        return $this;
    }
    public function getFile() {
       return $this->file;
    }
    public function setFile($file) {
        $this->file = $file;

        $this;
    }

}
