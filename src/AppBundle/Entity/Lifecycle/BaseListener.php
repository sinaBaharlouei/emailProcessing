<?php

namespace AppBundle\Entity\Lifecycle;

use AppBundle\Entity\HasAttachmentEntity;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class BaseListener
 * @package AppBundle\Entity\Lifecycle
 */
abstract class BaseListener implements EventSubscriber
{
   /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Constructor
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Returns an array of events child class subscriber wants to listen to.
     * @return array
     */
    protected function getChildSubscribedEvents() {
        return array();
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        $defaultEvents = array(
            Events::prePersist,
            Events::preUpdate,
            Events::postPersist,
            Events::postUpdate
        );
        $mergedEvents = array_merge($defaultEvents, $this->getChildSubscribedEvents());

        return array_unique($mergedEvents);
    }

	/**
	 * @param $object
	 * @param LifecycleEventArgs $args
	 */
    public function prePersist($object, LifecycleEventArgs $args)
    {
        $this->updateFields($object);
    }

	/**
	 * @param $object
	 * @param PreUpdateEventArgs $args
	 * @throws \Doctrine\ORM\ORMInvalidArgumentException
	 */
    public function preUpdate($object, PreUpdateEventArgs $args)
    {
        $this->updateFields($object);
        // We are doing a update, so we must force Doctrine to update the
        // changeset in case we changed something above
        $em   = $args->getEntityManager();
        $uow  = $em->getUnitOfWork();
        $meta = $em->getClassMetadata(get_class($object));
        $uow->recomputeSingleEntityChangeSet($meta, $object);
    }

    public function postPersist($object, LifecycleEventArgs $args){
        $this->afterUpdateFields($object);
    }

    public function postUpdate($object , LifecycleEventArgs $args){
        $this->afterUpdateFields($object);
    }

    /**
     * This must be called on prePersist and preUpdate if the event is about a
     * User.
     *
     * @param Object $object
     */
    protected function updateFields($object)
    {
        if ($object instanceof TimestampedEntity)
        {
            $now = new \DateTime();
            if (! $object->getCreatedAt())
                $object->setCreatedAt($now);
            $object->setUpdatedAt($now);
        }

        if ($object instanceof OwnedEntity)
        {
            $current_user = NULL;
            $token = $this->container->get('security.token_storage')->getToken();
            if (isset($token) && $token->getUser() instanceof Admin)
                $current_user = $token->getUser();
            if (! $object->getCreatedBy())
                $object->setCreatedBy($current_user);
            $object->setUpdatedBy($current_user);
        }
        if($object instanceof HasAttachmentEntity){
            $this->preUpload($object);
        }
    }

    /**
     * This must be called on postPersist and postUpdate
     *
     * @param Object $object
     */
    protected function afterUpdateFields($object)
    {
        if($object instanceof HasAttachmentEntity){
            $this->upload($object);
        }
    }

    public function preUpload($object) {
        if (null !== $object->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $object->setFilename($filename.'.'.$object->getFile()->guessExtension());
        }
    }

    public function upload($object)
    {
        if (null === $object->getFile()) {
            return;
        }

        $rootPath = __DIR__.'/../../../../../web/uploads/';

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $object->getFile()->move($rootPath . $object->getUploadDir(), $object->getFilename());

        // check if we have an old image
        $temp = $object->getTemp();
        if (isset($temp)) {
            // delete the old image
            unlink($rootPath . $object->getUploadDir().'/'.$temp);
            // clear the temp image path
            $temp = null;
            $object->setTemp(null);
        }
        $object->setFile(null);
    }
};