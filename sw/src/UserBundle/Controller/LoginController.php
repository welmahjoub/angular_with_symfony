<?php

namespace UserBundle\Controller;

use AppBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class FeedbackController
 * @package UserBundle\Controller
 *
 * @Route("/login")
 */
class LoginController extends BaseController
{
    /**
     * @Route("/user")
     * @Method({"POST"})
     * @param  Request $request
     *
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        dump($data);

        $serializer = $this->get("jms_serializer");
        $json = $serializer->serialize($data, "json");

        return $this->sendResponse($json,200);
    }

}
