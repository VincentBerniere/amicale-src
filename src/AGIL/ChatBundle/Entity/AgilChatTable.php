<?php

namespace AGIL\ChatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgilChatTable
 *
 * @ORM\Table(name="agil_chat_table")
 * @ORM\Entity(repositoryClass="AGIL\ChatBundle\Repository\AgilChatTableRepository")
 */
class AgilChatTable
{

    /**
     * @ORM\ManyToOne(targetEntity="AGIL\DefaultBundle\Entity\AgilUser")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="userId")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="chatTableId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $chatTableId;

    /**
     * @var string
     *
     * @ORM\Column(name="chatTableName", type="string", length=50, unique=true)
     */
    private $chatTableName;

    /**
     * @var string
     *
     * @ORM\Column(name="chatTablePassword", type="string", length=255)
     */
    private $chatTablePassword;


    /**
     * Get chatTableId
     *
     * @return integer 
     */
    public function getChatTableId()
    {
        return $this->chatTableId;
    }

    /**
     * Set chatTableName
     *
     * @param string $chatTableName
     * @return AgilChatTable
     */
    public function setChatTableName($chatTableName)
    {
        $this->chatTableName = $chatTableName;

        return $this;
    }

    /**
     * Get chatTableName
     *
     * @return string 
     */
    public function getChatTableName()
    {
        return $this->chatTableName;
    }

    /**
     * Set chatTablePassword
     *
     * @param string $chatTablePassword
     * @return AgilChatTable
     */
    public function setChatTablePassword($chatTablePassword)
    {
        $this->chatTablePassword = $chatTablePassword;

        return $this;
    }

    /**
     * Get chatTablePassword
     *
     * @return string 
     */
    public function getChatTablePassword()
    {
        return $this->chatTablePassword;
    }

    /**
     * Set user
     *
     * @param \AGIL\DefaultBundle\Entity\AgilUser $user
     * @return AgilChatTable
     */
    public function setUser(\AGIL\DefaultBundle\Entity\AgilUser $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AGIL\DefaultBundle\Entity\AgilUser 
     */
    public function getUser()
    {
        return $this->user;
    }
}
