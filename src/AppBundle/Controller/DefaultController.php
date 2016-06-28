<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="homepage")
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
    public function indexAction()
    {
        // replace this example code with whatever you need
		return $this->redirectToRoute('user_login');
    }
}
