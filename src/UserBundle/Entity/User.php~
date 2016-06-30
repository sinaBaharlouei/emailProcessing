<?php
namespace UserBundle\Entity;

use AppBundle\Entity\HasAttachmentEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use UserBundle\Entity\Category;
use UserBundle\Entity\Constants\RoleConstants;
use UserBundle\Entity\Constants\UserConstants;
use UserBundle\Entity\Contact;
use UserBundle\Entity\Email;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * UserBundle\Entity\User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User implements AdvancedUserInterface, \JsonSerializable, HasAttachmentEntity
{

	/**
	 * @ORM\Column(type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(name="name", type="string", length=128, nullable=true)
	 */
	private $name;

	/**
	 * @ORM\Column(name="lastName", type="string", length=128, nullable=true)
	 */
	private $lastName;

	/**
	 * @ORM\Column(name="password", type="string", length=128, nullable=false)
	 */
	private $password;

	/**
	 * @Assert\Email()
	 * @ORM\Column(name="email", type="string", length=128, unique=true, nullable=false)
	 */
	private $email;

	/**
	 * @ORM\Column(name="role", type="string", nullable=false)
	 */
	private $role = RoleConstants::ROLE_USER;

	/**
	 * @ORM\Column(name="status", type="string", nullable=false)
	 */
	private $status = UserConstants::STATUS_NOT_VERIFIED;

	/**
	 * @ORM\Column(name="created_at", type="datetime")
	 */
	private $createdAt = NULL;

	/**
	 * @ORM\Column(name="updated_at", type="datetime")
	 */
	private $updatedAt = NULL;
	
	/**
	 * @ORM\Column(name="salt", type="string", length=32, nullable=false)
	 */
	private $salt;

	/**
	 * Plain password. Used for model validation. Must not be persisted.
	 * @var string
	 */
	private $plainPassword;

	/**
	 * @ORM\OneToMany(targetEntity="Contact", mappedBy="contact1")
	 */
	protected $contacts;

	/**
	 * @ORM\OneToMany(targetEntity="Contact", mappedBy="contact2")
	 */
	protected $inContacts;

	/**
	 * @ORM\OneToMany(targetEntity="Email", mappedBy="sender")
	 */
	protected $sentEmails;

	/**
	 * @ORM\OneToMany(targetEntity="Email", mappedBy="receiver")
	 */
	protected $receivedEmails;

	/**
	 * @ORM\OneToMany(targetEntity="Category", mappedBy="user")
	 */
	protected $categories;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true, name="image_name")
	 */
	protected $imageName = NULL;

	/**
	 * @Assert\File(
	 *     maxSize="5M",
	 *     mimeTypes={"image/png", "image/jpeg"}
	 * )
	 * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageName")
	 * @var File $imageFile
	 */
	protected $imageFile;

	/**
	 * @Assert\File(maxSize="6000000")
	 */
	private $file;

	/**
	 * for file uploading
	 */
	private $temp;

	/**
	 * for getting suitable imageSize Src to the user
	 */
	public $imageURL = "";

	/**
     * Set name
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
		$this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

	/**
	 * Checks whether the user's account has expired.
	 * @return bool true if the user's account is non expired, false otherwise
	 */
	public function isAccountNonExpired()
	{
		return true;
	}

	/**
	 * @return bool true if the user is not locked, false otherwise
	 * @see LockedException
	 */
	public function isAccountNonLocked()
	{
		return ($this->status !== UserConstants::STATUS_LOCKED);
	}

	/**
	 * Checks whether the user's credentials (password) has expired.
	 * Internally, if this method returns false, the authentication system
	 * will throw a CredentialsExpiredException and prevent login.
	 * @return bool true if the user's credentials are non expired, false otherwise
	 *
	 * @see CredentialsExpiredException
	 */
	public function isCredentialsNonExpired()
	{
		return true;
	}

	/**
	 * Checks whether the user is enabled.
	 * @return bool true if the user is enabled, false otherwise
	 * @see DisabledException
	 */
	public function isEnabled()
	{
		return ($this->status == UserConstants::STATUS_ACTIVE);
	}

	/**
	 * Returns the roles granted to the user.
	 */
	public function getRoles()
	{
		return array($this->role);
	}

	/**
	 * Returns the salt that was originally used to encode the password.
	 *
	 * This can return null if the password was not encoded using a salt.
	 *
	 * @return string|null The salt
	 */
	public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * Returns the username used to authenticate the user.
	 *
	 * @return string The username
	 */
	public function getUsername()
	{
		return $this->getEmail();
	}

	/**
	 * Removes sensitive data from the user.
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials()
	{
	}

	/**
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 */
	function jsonSerialize()
	{
		return array(
			'id' => $this->getId(),
			'email' => $this->getEmail(),
		);
	}

    /**
     * Set salt
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

	/**
	 * Set plain Password
	 * @param $plainPassword
	 * @return $this
	 */
	public function setPlainPassword($plainPassword)
	{
		$this->plainPassword = $plainPassword;
		return $this;
	}

	/**
	 * Get plainPassword
	 * @return string
	 */
	public function getPlainPassword()
	{
		return $this->plainPassword;
	}

	/**
	 * Returns the password used to authenticate the user.
	 *
	 * This should be the encoded password. On authentication, a plain-text
	 * password will be salted, encoded, and then compared to this value.
	 *
	 * @return string The password
	 */
	public function getPassword()
	{
		return $this->password;
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set role
     *
     * @param integer $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return integer 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add sentEmails
     *
     * @param Email $sentEmails
     * @return User
     */
    public function addSentEmail(Email $sentEmails)
    {
        $this->sentEmails[] = $sentEmails;

        return $this;
    }

    /**
     * Remove sentEmails
     *
     * @param Email $sentEmails
     */
    public function removeSentEmail(Email $sentEmails)
    {
        $this->sentEmails->removeElement($sentEmails);
    }

    /**
     * Get sentEmails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSentEmails()
    {
        return $this->sentEmails;
    }

    /**
     * Add receivedEmails
     *
     * @param Email $receivedEmails
     * @return User
     */
    public function addReceivedEmail(Email $receivedEmails)
    {
        $this->receivedEmails[] = $receivedEmails;

        return $this;
    }

    /**
     * Remove receivedEmails
     *
     * @param Email $receivedEmails
     */
    public function removeReceivedEmail(Email $receivedEmails)
    {
        $this->receivedEmails->removeElement($receivedEmails);
    }

    /**
     * Get receivedEmails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReceivedEmails()
    {
        return $this->receivedEmails;
    }

    /**
     * Add contacts
     *
     * @param Contact $contacts
     * @return User
     */
    public function addContact(Contact $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param Contact $contacts
     */
    public function removeContact(Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Add inContacts
     *
     * @param Contact $inContacts
     * @return User
     */
    public function addInContact(Contact $inContacts)
    {
        $this->inContacts[] = $inContacts;

        return $this;
    }

    /**
     * Remove inContacts
     *
     * @param Contact $inContacts
     */
    public function removeInContact(Contact $inContacts)
    {
        $this->inContacts->removeElement($inContacts);
    }

    /**
     * Get inContacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInContacts()
    {
        return $this->inContacts;
    }

    /**
     * Add categories
     *
     * @param Category $categories
     * @return User
     */
    public function addCategory(Category $categories)
    {
		$this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param Category $categories
     */
    public function removeCategory(Category $categories)
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

	/**
	 * Get imageUrl
	 *
	 * @return string
	 */
	public function getImageUrl()
	{
		return $this->imageURL;
	}

	/** TODO: you have to return a default upload dir
	 * @return string upload dir
	 */
	public function getUploadDir()
	{
		return 'users';
	}

	/**
	 * @return string for using in the web
	 */
	public function getWebPath()
	{
		if($this->getFilename() === null)
			return null;
		return $this->getUploadDir().'/'.$this->getFileName();
	}


	/**
	 * For Pre-Uploading
	 *
	 * @param string $filename
	 */
	public function setFilename($filename)
	{
		$this->imageName = $filename;
	}

	/**
	 * Get filename
	 *
	 * @return string
	 */
	public function getFilename()
	{
		return $this->imageName;
	}

	/**
	 * @return UploadedFile
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	public function setFile(UploadedFile $file = null)
	{
		$this->file = $file;
		// check if we have an old image path
		if (isset($this->imageFileName)) {
			// store the old name to delete after the update
			$this->temp = $this->imageFileName;
			$this->imageFileName = null;
		} else {
			$this->imageFileName = 'initial';
		}
	}

	/**
	 * @return string
	 */
	public function getTemp()
	{
		return $this->temp;
	}

	/**
	 * @param $temp
	 * @internal param $file
	 */
	public function setTemp($temp)
	{
		$this->temp = $temp;
	}

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return User
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

	/**
	 * @return File
	 */
	public function getImageFile()
	{
		return $this->imageFile;
	}
}
