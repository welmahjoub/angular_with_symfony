<?php

namespace AppBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller
{

    public function __construct()
    {

    }

    /**
     *  Send a response in json format with the different headers
     *
     * @param        $data
     * @param        $status
     *
     * @param string $location
     *
     * @param bool   $jsonresponse
     *
     * @return Response
     */
    public function sendResponse($data, $status, $location = null, $jsonresponse = false){

        if($jsonresponse){
            $response = new JsonResponse($data, $status);
        }else{
            $response = new Response($data, $status);
        }
        if($location){
            $response->headers->set("location", $location);
        }
        $response->headers->set("Content-Type", "application/json");
        $response->headers->set("Access-Control-Allow-Origin", "http://localhost:8000/");
        $response->headers->set("Access-Control-Allow-Headers", "Content-Type");
        return $response;
    }

    /**
     *  Entity Manager
     * @return \Doctrine\Common\Persistence\ObjectManager|object
     */
    public function getEntitymanager(){
        return $this->getDoctrine()->getManager();
    }
}
