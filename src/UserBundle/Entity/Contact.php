<?php
namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use UserBundle\Entity\Constants\RoleConstants;
use UserBundle\Entity\Constants\UserConstants;
use UserBundle\Entity\User;

/**
 * UserBundle\Entity\Contact
 *
 * @ORM\Table(name="Contact")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\Repository\ContactRepository")
 */
class Contact implements \JsonSerializable
{

	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="contacts")
	 * @ORM\JoinColumn(name="contact_id1", referencedColumnName="id", nullable=false)
	 */
	protected $contact1;

	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="inContacts")
	 * @ORM\JoinColumn(name="contact_id2", referencedColumnName="id", nullable=false)
	 */
	protected $contact2;

	/**
	 * @ORM\Column(name="is_know", type="integer", nullable=false)
	 */
	private $isKnow = 0;

	/**
	 * @ORM\Column(name="is_accept", type="integer", nullable=false)
	 */
	private $isAccept = 0;

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
     * Set isKnow
     *
     * @param integer $isKnow
     * @return Contact
     */
    public function setIsKnow($isKnow)
    {
        $this->isKnow = $isKnow;

        return $this;
    }

    /**
     * Get isKnow
     *
     * @return integer 
     */
    public function getIsKnow()
    {
        return $this->isKnow;
    }

    /**
     * Set isAccept
     *
     * @param integer $isAccept
     * @return Contact
     */
    public function setIsAccept($isAccept)
    {
        $this->isAccept = $isAccept;

        return $this;
    }

    /**
     * Get isAccept
     *
     * @return integer 
     */
    public function getIsAccept()
    {
        return $this->isAccept;
    }

    /**
     * Set contact1
     *
     * @param User $contact1
     * @return Contact
     */
    public function setContact1(User $contact1)
    {
        $this->contact1 = $contact1;

        return $this;
    }

    /**
     * Get contact1
     *
     * @return User
     */
    public function getContact1()
    {
        return $this->contact1;
    }

    /**
     * Set contact2
     *
     * @param User $contact2
     * @return Contact
     */
    public function setContact2(User $contact2)
    {
        $this->contact2 = $contact2;

        return $this;
    }

    /**
     * Get contact2
     *
     * @return User
     */
    public function getContact2()
    {
        return $this->contact2;
    }
}
