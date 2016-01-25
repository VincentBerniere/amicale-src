<?php

namespace AGIL\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgilForumAnswer
 *
 * @ORM\Table(name="agil_forum_answer")
 * @ORM\Entity(repositoryClass="AGIL\ForumBundle\Repository\AgilForumAnswerRepository")
 */
class AgilForumAnswer
{

    /**
     * @ORM\ManyToOne(targetEntity="AGIL\ForumBundle\Entity\AgilForumSubject")
     * @ORM\JoinColumn(nullable=false,referencedColumnName="forumSubjectId")
     */
    private $subject;

    /**
     * @var int
     *
     * @ORM\Column(name="forumAnswerId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $forumAnswerId;

    /**
     * @var string
     *
     * @ORM\Column(name="forumAnswerText", type="text")
     */
    private $forumAnswerText;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="forumAnswerPostDate", type="datetime")
     */
    private $forumAnswerPostDate;


    /**
     * Get forumAnswerId
     *
     * @return integer 
     */
    public function getForumAnswerId()
    {
        return $this->forumAnswerId;
    }

    /**
     * Set forumAnswerText
     *
     * @param string $forumAnswerText
     * @return AgilForumAnswer
     */
    public function setForumAnswerText($forumAnswerText)
    {
        $this->forumAnswerText = $forumAnswerText;

        return $this;
    }

    /**
     * Get forumAnswerText
     *
     * @return string 
     */
    public function getForumAnswerText()
    {
        return $this->forumAnswerText;
    }

    /**
     * Set forumAnswerPostDate
     *
     * @param \DateTime $forumAnswerPostDate
     * @return AgilForumAnswer
     */
    public function setForumAnswerPostDate($forumAnswerPostDate)
    {
        $this->forumAnswerPostDate = $forumAnswerPostDate;

        return $this;
    }

    /**
     * Get forumAnswerPostDate
     *
     * @return \DateTime 
     */
    public function getForumAnswerPostDate()
    {
        return $this->forumAnswerPostDate;
    }

    /**
     * Set subject
     *
     * @param \AGIL\ForumBundle\Entity\AgilForumSubject $subject
     * @return AgilForumAnswer
     */
    public function setSubject(\AGIL\ForumBundle\Entity\AgilForumSubject $subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \AGIL\ForumBundle\Entity\AgilForumSubject 
     */
    public function getSubject()
    {
        return $this->subject;
    }
}
