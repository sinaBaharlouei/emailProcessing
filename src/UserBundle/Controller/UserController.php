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
use UserBundle\Entity\Constants\RoleConstants;
use UserBundle\Entity\Constants\UserConstants;
use UserBundle\Entity\User;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends BaseController
{

	/**
	 * Input Parameters:
	 *  name: String,
	 *  password: String,
	 *  email: String (optional),
	 * Return Values:
	 *  status: Bool
	 * @Route(path="/register", name="user_register")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 * @throws \Doctrine\ORM\ORMInvalidArgumentException
	 * @throws \Exception
	 */

	public function registerAction(Request $request)
	{
		// Get Parameters
		$name = $this->required("firstname");
		$lastName = $this->required("lastname");
		$email = $this->required("email");
		$plainPassword = $this->required("pass");

		$status = UserConstants::STATUS_ACTIVE;
		$type = RoleConstants::ROLE_USER;

		$user_list = array(
			'name' => $name,
			'lastName' => $lastName,
			'plain_password' => $plainPassword,
			'email' => $email,
			'status' => $status,
			'type' => $type,
		);

		$em = $this->getDoctrine()->getEntityManager();
		$userModel = $em->getRepository('UserBundle:User');

		$old_user = $userModel->findOneBy(
			array('email' => $user_list['email'])
		);

		if ($old_user) {
			return $this->redirectToRoute('user_login',
				array('message' => "User with this email already exist. Please register with a new email address"));
		}


		$user = new User();

		$user->setName($user_list['name']);
		$user->setLastName($user_list['lastName']);
		$user->setPlainPassword($user_list['plain_password']);
		$user->setEmail($user_list['email']);
		$user->setStatus($user_list['status']);
		$user->setRole($user_list['type']);

		$created_at = new \DateTime();
		$user->setCreatedAt($created_at);
		$user->setUpdatedAt($created_at);

		// password encoding
		$encoder = $this->container->get('security.password_encoder');

		$user_password = $encoder->encodePassword($user, $user_list['plain_password']);
		$user->setPassword($user_password);
		$user->eraseCredentials();

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

		// $this->validate($user);
		$em->persist($user);
		$em->flush();


		return $this->redirectToRoute('user_login',
		array('message' => "You are registered successfully.")
	);
	}

	/**
	 * @Route(path="/login", name="user_login")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function loginAction(Request $request)
	{
		//echo $this->getUser()->getEmail();
		$message = $this->optional('message');

		$rand = rand(1, 6);
		$image_url = "/captcha/cap" . $rand . ".png";
		$value = UserConstants::$caps[$rand];

		$session = $request->getSession();
		// get the login error if there is one

		if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(
				SecurityContextInterface::AUTHENTICATION_ERROR
			);
		} elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
               $message ="invalid user name or password.";
			$error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);

			$session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
		} else {
			$error = '';
		}
		return $this->render(
			'@User/User/LoginRegister.html.twig',
			array(
				'error' => $error,
				'message' => $message,
				'image_url' => $image_url,
				'value' => $value
			)
		);
	}

	/**
	 * @Route(path="/login_check", name="user_login_check")
	 */
	public function loginCheckAction() {
		return new Response('');
	}

	/**
	 * @Route(path="/logout", name="user_logout")
	 */
	public function logoutAction() {
		return new Response('');
	}

	private function createUser(array $user_list) {

		$em = $this->getDoctrine()->getEntityManager();
		$userModel = $em->getRepository('UserBundle:User');

		$old_user = $userModel->findOneBy(
			array('email' => $user_list['email'])
		);

		if ($old_user)
			$this->error("User is already exist.", Logger::ERROR);

		$user = new User();

		$user->setName($user_list['name']);
		$user->setLastName($user_list['lastName']);
		$user->setPlainPassword($user_list['plain_password']);
		$user->setEmail($user_list['email']);
		$user->setStatus($user_list['status']);
		$user->setRole($user_list['type']);

		$created_at = new \DateTime();
		$user->setCreatedAt($created_at);
		$user->setUpdatedAt($created_at);

		// password encoding
		$encoder = $this->container->get('security.password_encoder');

		$user_password = $encoder->encodePassword($user, $user_list['plain_password']);
		$user->setPassword($user_password);
		$user->eraseCredentials();

		// $this->validate($user);
		$em->persist($user);
		$em->flush();
		return $user;
	}

	// like items

	// another person profile

	// get lists of user


	/**
	 * @Route(path="/target", name="user_target")
	 */
	public function targetAction() {
		$user = $this->getUser();
		if ($user) {
			$em = $this->getDoctrine()->getEntityManager();
			$user->setUpdatedAt(new \DateTime());
			$em->flush();
		}
		return $this->redirectToRoute('profile_inbox');
	}
}
