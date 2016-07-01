<?php

namespace UserBundle\Controller;

use AppBundle\Controller\BaseController;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Tests\Model;
use UserBundle\Entity\Constants\RoleConstants;
use UserBundle\Entity\Constants\UserConstants;
use UserBundle\Entity\Contact;
use UserBundle\Entity\Email;
use UserBundle\Entity\User;

/**
 * Profile controller.
 *
 * @Route("/profile")
 */
class ProfileController extends BaseController
{
	/**
	 * @Route(path="/inbox", name="profile_inbox")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function inboxAction(Request $request)
	{
		$message = $this->optional("message");
		$user = $this->getUser();
		return $this->render(
			'@User/Profile/Inbox.html.twig',
			array(
				'user' => $user,
				'message' => $message
			)
		);
	}

	/**
	 * @Route(path="/profile", name="profile_profile")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function profileAction(Request $request)
	{
		$user = $this->getUser();
		$em = $this->getDoctrine()->getEntityManager();
		$contactRep = $em->getRepository("UserBundle:Contact");

		$path = $this->get('kernel')->getRootDir() . '/../web' . "/users/background/" . $user->getId() . '.png';

		$has_image = false;
		$background_location = null;
		if(file_exists($path)) {
			$has_image = true;
			$background_location = "/users/background/" . $user->getId() . '.png';
		}

		$pending_contacts = $contactRep->findBy(
			array(
				'contact2' => $user,
				'isAccept' => 0
			)
		);

        $message = $this->optional("message");
		$user = $this->getUser();
		return $this->render(
			'@User/Profile/Profile.html.twig',
			array(
				'user' => $user ,
                'message'=> $message,
				'has_image' => $has_image,
				'background' => $background_location,
				'pending_contacts' => $pending_contacts
			)
		);
	}

	/**
	 * @Route(path="/users", name="profile_users")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function usersAction(Request $request)
	{

		$message = $this->optional("message");

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		$users = $userRepository->findAll();
		$me = $this->getUser();
		$contacts = $me->getContacts();

		$final_users = array();
		foreach ($users as $user) {

			if ($user->getId() == $me->getId())
				continue;

			$is_added_before = false;
			foreach($contacts as $contact) {
				if($contact->getContact2()->getId() == $user->getId()) {
					$is_added_before = true;
					break;
				}
			}
			if ($is_added_before)
				continue;

			$final_users[] = $user;
		}

		return $this->render(
			'@User/Profile/Users.html.twig',
			array(
				'me' => $me,
				'users' => $final_users,
				'message' => $message
			)
		);
	}

	/**
	 * @Route(path="/addContact", name="profile_add_contact")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function addToContactsAction(Request $request)
	{
		$contact1 = $this->getUser();
		$contact2_id = $this->required('user_id');

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		$contact2 = $userRepository->find($contact2_id);

		$contact = new Contact();
		$contact->setContact1($contact1);
		$contact->setContact2($contact2);
		$contact->setIsKnow(0);
		$contact->setIsAccept(0);

		$em->persist($contact);
		$em->flush();

		return $this->redirectToRoute(
			'profile_users',
			array(
				'message' => "Contact added successfully."
			)
		);
	}

	/**
	 * @Route(path="/getUsers", name="profile_get_users")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function getUsersAction(Request $request)
	{

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		$users = $userRepository->findAll();
		$me = $this->getUser();
		$contacts = $me->getContacts();

		$final_users = array();
		foreach ($users as $user) {

			if ($user->getId() == $me->getId())
				continue;

			$is_added_before = false;
			foreach($contacts as $contact) {
				if($contact->getContact2()->getId() == $user->getId()) {
					$is_added_before = true;
					break;
				}
			}
			if ($is_added_before)
				continue;

			$final_users[] = array(
				'email' => $user->getEmail(),
				'name' => $user->getName(),
				'lastName' => $user->getLastName(),
				'image' => $user->getImageUrl(),
			);
		}
		$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= "<users>";
		foreach($final_users as $user) {
			$output .= "<user>";

			$output .= "<img>";
			$output .= $user['image'];
			$output .= "</img>";

			$output .= "<first>";
			$output .= $user['name'];
			$output .= "</first>";

			$output .= "<last>";
			$output .= $user['lastName'];
			$output .= "</last>";

			$output .= "<username>";
			$output .= $user['email'];
			$output .= "</username>";

			$output .= "</user>";
		}
		$output .= "</users>";
		header("Content-type: text/xml");
		$xml = new \SimpleXMLElement($output);
		echo $xml->asXML();
		exit();
	}

	/**
	 * @Route(path="/getProfile", name="profile_get_profile")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function getProfileAction(Request $request)
	{

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		$users = $userRepository->findAll();
		$me = $this->getUser();
		$contacts = $me->getContacts();

		$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= "<data>";
		$output .= "<first>";
		$output .= $me->getName();
		$output .= "</first>";

		$output .= "<last>";
		$output .= $me->getLastName();
		$output .= "</last>";

		$output .= "<username>";
		$output .= $me->getEmail();
		$output .= "</username>";

		$output .= "<img>";
		$output .= $me->imageURL;
		$output .= "</img>";

		$output .= "<contacts>";

		foreach($contacts as $contact) {
			$user = $contact->getContact2();
			$output .= "<contact>";

			$output .= "<img>";
			$output .= $user->imageURL;
			$output .= "</img>";

			$output .= "<first>";
			$output .= $user->getName();
			$output .= "</first>";

			$output .= "<last>";
			$output .= $user->getLastName();
			$output .= "</last>";

			$output .= "<username>";
			$output .= $user->getEmail();
			$output .= "</username>";

			$output .= "</contact>";
		}

		$output .= "</contacts>";
		$output .= "</data>";
		header("Content-type: text/xml");
		$xml = new \SimpleXMLElement($output);
		echo $xml->asXML();
		exit();
	}


    /**
     * @Route(path="/compose", name="profile_compose")
     * @Template
     * @param Request $request
     * @return array
     */
    public function composeAction(Request $request)
    {
        $user = $this->getUser();
        return $this->render(
            '@User/Profile/ComposeEmail.html.twig',
            array(
                'user' => $user
            )
        );
    }


	/**
	 * @Route(path="/composeEmail", name="profile_compose_email")
	 * @Template
	 * @param Request $request
	 * @return array
	 * @throws \Doctrine\ORM\ORMInvalidArgumentException
	 * @throws \Exception
	 */
    public function composeEmailAction(Request $request)
    {

        $sender = $this->getUser();
        $hercontacts = $this->getUser()->getContacts();
        $receiver_email = $this->required('to');
        $em = $this->getDoctrine()->getEntityManager();
        $userRepository = $em->getRepository("UserBundle:User");
        $receiver = $userRepository->findOneBy
		(
			array('email' => $receiver_email)
		);
		if (!$receiver) {
			return $this->redirectToRoute(
				'profile_inbox',
				array(
					'message' =>  "invalid email address"
				)
			);
		}
        $is_contact = false;


        foreach ($hercontacts as $user) {

            if ($user->getContact2()->getId() == $receiver->getId() && $user->getIsAccept()) {
                $is_contact = true;
                continue;
            }
        }

        if ($is_contact==false) {
            return $this->redirectToRoute(
                'profile_inbox',
                array(
                    'message' =>  "you can only send message to your contacts."
                )
            );
        }

        $date = new \DateTime() ;


        $subject = $this->required('subject');
        $text = $this-> required('text');

        $email = new Email();
        $email->setSender($sender);
        $email->setReceiver($receiver);
		$email->setReceiverName($receiver->getName());
		$email->setSenderName($sender->getName());
        $email->setTitle($subject);
        $email->setText($text);
        $email->setIsRead(0);
		$email->setIsKnow(0);
        $email->setCreatedAt($date);
        $email->setIsSpam(0);

		if ( isset($_FILES['attachment'])) {

			if ( is_uploaded_file($_FILES['attachment']['tmp_name'])) {

				$name = $_FILES['attachment']['name'];
				if (! move_uploaded_file($_FILES['attachment']['tmp_name'], $path = $this->get('kernel')->getRootDir() . '/../web' . "/attachments/" . $name))
				{
					throw new \Exception("picture not moved successfully");
				}
				$email->setAttachment($name);
			}
		} else throw new \Exception("sa");

        $em->persist($email);
        $em->flush();

        return $this->redirectToRoute(
            'profile_inbox',
            array(
                'message' =>"message sent"
            )
        );
    }



     /**
	 * @Route(path="/getInbox", name="profile_getInbox")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
    public function getInboxAction(Request $request)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $userRepository = $em->getRepository("UserBundle:User");
        // $users = $userRepository->findAll();
        $me = $this->getUser();
        $emails = $me->getReceivedEmails();

        $output = '<?xml version="1.0" encoding="UTF-8"?>';
        $output .= "<mails>";
        foreach($emails as $email) {
            $output .= "<mail>";
            $sender = $email->getSender()->getName();
            $isSpam = $email-> getIsSpam();
            $isRead = $email->getIsRead();
            $id = $email->getId();
            $output .= "<id>";
            $output .= $id ;
            $output .= "</id>";
            $output .= "<from>";
            $output .= $sender ;
            $output .= "</from>";

            $receiver = $email-> getReceiver()->getName();
            $output .= "<to>";
            $output .= $receiver ;
            $output .= "</to>";
            $date = $email->getCreatedAt();
            $content = $email -> getText();
			if (strlen($content) > 25) {
				$content = substr($content, 0, 25);
			}

            $subject = $email->getTitle();
            $output .= "<subject>";
            $output .= $subject ;
            $output .= "</subject>";
            $output .= "<text>";
            $output .= $content ;
            $output .= "</text>";
            $output .= "<spam>";
            $output .= $isSpam;
            $output .= "</spam>";
            $output .= "<read>";
            $output .= $isRead;
            $output .= "</read>";


            $output .= "<date>";
            $output .= $date->format('H:i Y/m/d '); ;
            $output .= "</date>";
            $output .= "<attachments>";
			if($email->getAttachment()) {
				$output .= "<attach>";
				$output .= "/attachments/" . $email->getAttachment();
				$output .= "</attach>";

			}
            // for each attachment add an <attach></attach> tag
            $output .= "</attachments>";

			$email->setIsKnow(1);
			$em->flush();

            $output .= "</mail>";

        }

        ;
        $output .= "</mails>";
        header("Content-type: text/xml");
        $xml = new \SimpleXMLElement($output);
        echo $xml->asXML();
        exit();
    }

	/**
	 * @Route(path="/refresh", name="profile_refresh")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function refreshAction(Request $request)
	{

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		// $users = $userRepository->findAll();
		$me = $this->getUser();
		$emails = $me->getReceivedEmails();

		$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= "<mails>";
		foreach($emails as $email) {
			if($email->getIsKnow() == 1)
				continue;

			$output .= "<mail>";
			$sender = $email->getSender()->getName();
			$isSpam = $email-> getIsSpam();
			$isRead = $email->getIsRead();
			$id = $email->getId();
			$output .= "<id>";
			$output .= $id ;
			$output .= "</id>";
			$output .= "<from>";
			$output .= $sender ;
			$output .= "</from>";

			$receiver = $email->getReceiver()->getName();
			$output .= "<to>";
			$output .= $receiver ;
			$output .= "</to>";
			$date = $email->getCreatedAt();
			$content = $email -> getText();
			if (strlen($content) > 25) {
				$content = substr($content, 0, 25);
			}

			$subject = $email->getTitle();
			$output .= "<subject>";
			$output .= $subject ;
			$output .= "</subject>";
			$output .= "<text>";
			$output .= $content ;
			$output .= "</text>";
			$output .= "<spam>";
			$output .= $isSpam;
			$output .= "</spam>";
			$output .= "<read>";
			$output .= $isRead;
			$output .= "</read>";


			$output .= "<date>";
			$output .= $date->format('H:i Y/m/d '); ;
			$output .= "</date>";
			$output .= "<attachments>";
			if($email->getAttachment()) {
				$output .= "<attach>";
				$output .= "/attachments/" . $email->getAttachment();
				$output .= "</attach>";

			}
			$email->setIsKnow(1);
			$em->flush();
			// for each attachment add an <attach></attach> tag
			$output .= "</attachments>";

			$output .= "</mail>";

		}

		;
		$output .= "</mails>";
		header("Content-type: text/xml");
		$xml = new \SimpleXMLElement($output);
		echo $xml->asXML();
		exit();
	}


    /**
     * @Route(path="/getSent", name="profile_getSent")
     * @Template
     * @param Request $request
     * @return array
     */


    public function getSentAction(Request $request)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $userRepository = $em->getRepository("UserBundle:User");
        // $users = $userRepository->findAll();
        $me = $this->getUser();
        $emails = $me->getSentEmails();

        $output = '<?xml version="1.0" encoding="UTF-8"?>';
        $output .= "<mails>";
        foreach($emails as $email) {
            $output .= "<mail>";
            $sender = $email->getSender()->getName();
            $id = $email->getId();
            $output .= "<id>";
            $output .= $id ;
            $output .= "</id>";
            $output .= "<from>";
            $output .= $sender ;
            $output .= "</from>";
            $receiver = $email-> getReceiver()->getName();
            $output .= "<to>";
            $output .= $receiver ;
            $output .= "</to>";
            $date = $email->getCreatedAt();
            $content = $email -> getText();
			if (strlen($content) > 25) {
				$content = substr($content, 0, 25);
			}

            $subject = $email->getTitle();
            $output .= "<subject>";
            $output .= $subject ;
            $output .= "</subject>";
            $output .= "<text>";
            $output .= $content ;
            $output .= "</text>";
            $output .= "<date>";
            $output .= $date->format('H:i Y/m/d '); ;
            $output .= "</date>";
            $output .= "<attachments>";
            // for each attachment add an <attach></attach> tag
			if($email->getAttachment()) {
				$output .= "<attach>";
				$output .= "/attachments/" . $email->getAttachment();
				$output .= "</attach>";

			}

            $output .= "</attachments>";

            $output .= "</mail>";

        }

        ;
        $output .= "</mails>";
        header("Content-type: text/xml");
        $xml = new \SimpleXMLElement($output);
        echo $xml->asXML();
        exit();
    }

    /**
     * @Route(path="/read/{id}", name="profile_read")
     * @Template
     * @param Request $request
     * @param $id
     * @return array
     */
    public function readAction(Request $request, $id)
    {
        $emailId =$id;

        $em = $this->getDoctrine()->getEntityManager();
        $emailRepository = $em->getRepository("UserBundle:Email");

        $email = $emailRepository->find($emailId);



        $output = '<?xml version="1.0" encoding="UTF-8"?>';
        $output .= "<mails>";

        $output .= "<mail>";
        $sender = $email->getSender()->getName();
        $output .= "<from>";
        $output .= $sender ;
        $output .= "</from>";
        $receiver = $email-> getReceiver()->getName();
        $output .= "<to>";
        $output .= $receiver ;
        $output .= "</to>";
        $date = $email->getCreatedAt();
		$content = $email -> getText();

        $subject = $email->getTitle();
        $output .= "<subject>";
        $output .= $subject ;
        $output .= "</subject>";
        $output .= "<text>";
        $output .= $content ;
        $output .= "</text>";
        $output .= "<spam>";
        $output .= $email->getIsSpam();
        $output .= "</spam>";
        $email-> setIsRead(1);
		$em->flush();
        $output .= "<read>";
        $output .=   $email-> getIsRead();
        $output .= "</read>";

        $output .= "<date>";
        $output .= $date->format('H:i Y/m/d '); ;
        $output .= "</date>";
        // for each attachment add an <attach></attach> tag
		if($email->getAttachment()) {
			$output .= "<attach>";
			$output .= "/attachments/" . $email->getAttachment();
			$output .= "</attach>";
		}
        $output .= "</mail>";
        $output .= "</mails>";
        header("Content-type: text/xml");
        $xml = new \SimpleXMLElement($output);
        echo $xml->asXML();
        exit();

    }

    /**
     * @Route(path="/readHtml", name="profile_readHtml")
     * @Template
     * @param Request $request
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return array
     */



    public function readHtmlAction(Request $request)
    {
        $id = $this->required("id");
        $user = $this->getUser();
        return $this->render(
            '@User/Profile/ReadEmail.html.twig',
            array(
                'user' => $user,
                'id' => $id
            )
        );
    }

    /**
     * @Route(path="/deleteEmail", name="profile_delete_email")
     * @Template
     * @param Request $request
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return array
     */

    public function deleteEmailAction(Request $request)
    {
        $id = $this->required("id");


        $user = $this->getUser();

        $emailId =$id;

        $em = $this->getDoctrine()->getEntityManager();
        $emailRepository = $em->getRepository("UserBundle:Email");

        $email = $emailRepository->find($emailId);
        if (!$email)
            return $this->render(
                '@User/Profile/Inbox.html.twig',
                array(
                    'user' => $user,
                    'id' => $id,
                    'message' =>'not found'
                )
            );

        $em->remove($email);
        $em->flush();

        return $this->render(
            '@User/Profile/Inbox.html.twig',
            array(
                'user' => $user,
                'id' => $id,
                'message' =>'deleted successfully'
            )
        );


    }



    /**
     * @Route(path="/edit", name="profile_edit")
     * @Template
     * @param Request $request
     * @return array
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Exception
     */
    public function editAction(Request $request)
    {

        $user = $this->getUser();
        $firstName = $this->optional('firstname');
        $lastName = $this->optional('lastname');
        $email = $this->optional('email');
        $password = $this->optional('pass');

        $em = $this->getDoctrine()->getEntityManager();
      //  $userRepository = $em->getRepository("UserBundle:User");

		if (!empty($firstName))
			$user->setName($firstName);

		if (!empty($lastName))
        	$user->setLastName($lastName);
        // $user->setEmail($email);
		// $user->setPlainPassword($password);

		if ( isset($_FILES['image'])) {

            if ( is_uploaded_file($_FILES['image']['tmp_name'])) {

                $picture_name = uniqid();
                if (! move_uploaded_file($_FILES['image']['tmp_name'], $path = $this->get('kernel')->getRootDir() . '/../web' . "/users/pics/" . $picture_name . '.png'))
                {
                    throw new \Exception("picture not moved successfully");
                }
                $user->setFilename($picture_name . ".png");
            }
        }

		if ( isset($_FILES['background'])) {

			if ( is_uploaded_file($_FILES['background']['tmp_name'])) {

				if (! move_uploaded_file($_FILES['background']['tmp_name'], $path = $this->get('kernel')->getRootDir() . '/../web' . "/users/background/" . $user->getId() . '.png'))
				{
					throw new \Exception("background picture not moved successfully");
				}
			}
		}


        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute(
            'profile_profile',
            array(
                'message' =>"profile changed successfully."
            )
        );
    }


	/**
	 * @Route(path="/accept", name="profile_accept")
	 * @Template
	 * @param Request $request
	 * @return array
	 * @throws \Doctrine\ORM\ORMInvalidArgumentException
	 * @throws \Exception
	 */
	public function acceptAction(Request $request)
	{
		$user = $this->getUser();
		$pending_user_id = $this->required('id');

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		$contactRepository = $em->getRepository("UserBundle:Contact");
		$pending_user = $userRepository->find($pending_user_id);

		$contact = $contactRepository->findOneBy(
			array(
				'contact1' => $pending_user,
				'contact2' => $user
			)
		);
		$contact->setIsAccept(1);
		$em->flush();

		return $this->redirectToRoute(
			'profile_profile',
			array(
				'message' =>"contact is accepted"
			)
		);
	}

}
