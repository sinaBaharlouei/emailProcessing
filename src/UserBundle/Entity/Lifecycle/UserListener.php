<?php

namespace UserBundle\Entity\Lifecycle;
use AppBundle\Entity\Lifecycle\BaseListener;
use Doctrine\Common\EventSubscriber;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Events;
use UserBundle\Entity\Constants\ImageConstants;
use UserBundle\Entity\User;

/**
 * Class UserListener
 * @package UserBundle\Entity\Lifecycle
 */
class UserListener extends  BaseListener
{
	/**
	 * Returns an array of events this subscriber wants to listen to.
	 *
	 * @return array
	 */
	public function getSubscribedEvents()
	{
		return array(Events::postLoad);
	}

	/**
	 * This must be called for calling the prepareImgSrc() function
	 *
	 * @param Object $object
	 */
	public function postLoad($object) {
		$this->prepareImageURL($object);
	}

	/**
	 * This must be called for preparing suitable images for user
	 * @param Object $object
	 */
	public function prepareImageURL($object)
	{
		$session = new Session();
		$typeId = $session->get('res_type_id');
		if (! array_key_exists($typeId, ImageConstants::$imageSizes)) {
			$typeId = 3;
		}
		$path = ImageConstants::USER_PATH . $object->getImageName();

		// string to put directly in the "src" of the tag <img>
		$cacheManager = $this->container->get('liip_imagine.cache.manager');
		$srcPath = $cacheManager->getBrowserPath($path, ImageConstants::$imageSizes[$typeId]);
		$object->imageURL = $srcPath;
	}

};
