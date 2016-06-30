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
 * @Route("/email")
 */
class EmailController extends BaseController
{

	/**
	 * @Route(path="/getMails", name="email_sorted_inbox")
	 * @Template
	 * @param Request $request
	 * @return array
	 */
	public function getSortedInboxAction(Request $request)
	{

		$em = $this->getDoctrine()->getEntityManager();
		$userRepository = $em->getRepository("UserBundle:User");
		$emailRepository = $em->getRepository("UserBundle:Email");

		$me = $this->getUser();

		$sort_by = $this->required("sortby");
		$nom = $this->required("nom");


		$emails = null;


		switch($sort_by) {

			case 'date':
				$emails = $emailRepository->findBy(
					array(
						'receiver' => $me
					),
					array(
						'createdAt' => 'desc'
					),
					$nom, 0
				);
				break;

			case 'sender':
				$emails = $emailRepository->findBy(
					array(
						'receiver' => $me
					),
					array(
						'senderName' => 'asc'
					),
					$nom, 0
				);
				break;

			default:
				$emails = $emailRepository->findBy(
					array(
						'receiver' => $me
					),
					array(
						'attachment' => 'desc'
					),
					$nom, 0
				);

		}

		$output = '<?xml version="1.0" encoding="UTF-8"?>';
		$output .= "<mails>";
		foreach($emails as $email) {
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
			$content = $email->getText();

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
			if($email->getAttachment()) {
				$output .= "<attach>";
				$output .= "/attachments/" . $email->getAttachment();
				$output .= "</attach>";

			}
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






}
