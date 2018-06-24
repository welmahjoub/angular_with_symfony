<?php

namespace UserBundle\Controller;

use AppBundle\Controller\BaseController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FeedbackController
 * @package UserBundle\Controller
 *
 * @Route("/login")
 */
class LoginController extends BaseController
{
    /**
     * @Route("/index")
     */
    public function indexAction()

    {
        return $this->sendResponse("My mom",200);
    }

}
