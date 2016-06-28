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
		$user = $this->getUser();
		return $this->render(
			'@User/Profile/Inbox.html.twig',
			array(
				'user' => $user
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
		return $this->render(
			'@User/Profile/Profile.html.twig',
			array(
				'user' => $user
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
				'image' => "",
			);
		}
		$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= "<users>";
		foreach($final_users as $user) {
			$output .= "<user>";

			$output .= "<img>";
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
		$output .= "</img>";

		$output .= "<contacts>";

		foreach($contacts as $contact) {
			$user = $contact->getContact2();
			$output .= "<contact>";

			$output .= "<img>";
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
     */
    public function composeEmailAction(Request $request)
    {
        $sender = $this->getUser();
        $reciever_email = $this->required('to');

        $em = $this->getDoctrine()->getEntityManager();
        $userRepository = $em->getRepository("UserBundle:User");
        $reciever = $userRepository->  findOneBy( array('email' => $reciever_email));






        $date = new \DateTime();


        $subject = $this->required('subject');
        $text = $this-> required('text');

        $email = new Email();
        $email->setSender($sender);
        $email->setReceiver( $reciever);
        $email->setTitle($subject);
        $email->setText($text);
        $email->setIsRead(0);
        $email->setCreatedAt($date);
        $email->setIsSpam(0);

        $em->persist($email);
        $em->flush();

        return $this->redirectToRoute(
            'profile_inbox',
            array(
                'message' => "Messege sent."
            )
        );
    }




}
