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
        $em= $this->getEntitymanager();
        $user = $em->getRepository("UserBundle:User")->findOneBy(['email'=>$data['email']]);

        if($user){
            if(password_verify($data['code'], $user->getPassword() )){
                $result = [
                 "success" => true,
                  "msg"=> "Bienvenu cher ".$user->getName(),
                  "data"=>[
                    "user"=>$user,
                  ],
                ];
            }else{

                $result = [
                    "success" => false,
                    "msg"=> "Mot de passe incorrect"
                ];

            }
        } else {
            $result = [
                "success" => false,
                "msg"=> "Email incorrect / veuillez contactez votre administrateur"
            ];

        }


        $serializer = $this->get("jms_serializer");
        $json = $serializer->serialize($result, "json");
        return $this->sendResponse($json,200);
    }

}
