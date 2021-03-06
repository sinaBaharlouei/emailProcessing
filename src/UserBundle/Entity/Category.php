<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use UserBundle\Entity\Constants\RoleConstants;
use UserBundle\Entity\Constants\UserConstants;
use UserBundle\Entity\User;

/**
 * UserBundle\Entity\Category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\Repository\CategoryRepository")
 */
class Category implements \JsonSerializable
{

	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="categories")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
	 */
	protected $user;

	/**
	 * @ORM\Column(name="name", type="string", length=128, nullable=true)
	 */
	private $name;

	/**
	 * @ORM\Column(name="created_at", type="datetime")
	 */
	private $createdAt = NULL;

	/**
	 * @ORM\OneToMany(targetEntity="Category", mappedBy="user")
	 */
	protected $categories;

	/**
	 * (PHP 5 &gt;= 5.4.0)<br/>
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 */
	function jsonSerialize()
	{
		// TODO: Implement jsonSerialize() method.
	}

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
     * Set title
     *
     * @param string $title
     * @return Email
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Email
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Email
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isRead
     *
     * @param integer $isRead
     * @return Email
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return integer 
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set isSpam
     *
     * @param integer $isSpam
     * @return Email
     */
    public function setIsSpam($isSpam)
    {
        $this->isSpam = $isSpam;

        return $this;
    }

    /**
     * Get isSpam
     *
     * @return integer 
     */
    public function getIsSpam()
    {
        return $this->isSpam;
    }

    /**
     * Set sender
     *
     * @param User $sender
     * @return Email
     */
    public function setSender(User $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param User $receiver
     * @return Email
     */
    public function setReceiver(User $receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Category
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add categories
     *
     * @param \UserBundle\Entity\Category $categories
     * @return Category
     */
    public function addCategory(\UserBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \UserBundle\Entity\Category $categories
     */
    public function removeCategory(\UserBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
