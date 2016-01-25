<?php

namespace AGIL\DefaultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgilTag
 *
 * @ORM\Table(name="agil_tag")
 * @ORM\Entity(repositoryClass="AGIL\DefaultBundle\Repository\AgilTagRepository")
 */
class AgilTag
{

    /**
     * @ORM\ManyToOne(targetEntity="AGIL\ProfileBundle\Entity\AgilProfileSkillsCategory")
     * @ORM\JoinColumn(nullable=true,referencedColumnName="profileSkillsCategoryId")
     */
    private $skillCategory;

    /**
     * @var int
     *
     * @ORM\Column(name="tagId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tagId;

    /**
     * @var string
     *
     * @ORM\Column(name="tagName", type="string", length=20, unique=true)
     */
    private $tagName;


    /**
     * Get tagId
     *
     * @return integer 
     */
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * Set tagName
     *
     * @param string $tagName
     * @return AgilTag
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;

        return $this;
    }

    /**
     * Get tagName
     *
     * @return string 
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * Set skillCategory
     *
     * @param \AGIL\ProfileBundle\Entity\AgilProfileSkillsCategory $skillCategory
     * @return AgilTag
     */
    public function setSkillCategory(\AGIL\ProfileBundle\Entity\AgilProfileSkillsCategory $skillCategory = null)
    {
        $this->skillCategory = $skillCategory;

        return $this;
    }

    /**
     * Get skillCategory
     *
     * @return \AGIL\ProfileBundle\Entity\AgilProfileSkillsCategory 
     */
    public function getSkillCategory()
    {
        return $this->skillCategory;
    }
}
