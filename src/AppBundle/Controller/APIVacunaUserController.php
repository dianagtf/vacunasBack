<?php

namespace AppBundle\Controller;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


use AppBundle\Entity\Message;
use AppBundle\Entity\Vacunas;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class APIVaccinesController
 * @package Vacunas\VacunasBack\AppBundle\Controller
 *
 * @Route("/api/v1/vacunauser");
 */

class APIVacunaUserController extends Controller
{
    /**
     * @Route("", name="vacunauser_cget");
     * @Method("GET")
     */
    public function cgetAPIVacunaUserAction(){

        $em = $this->getDoctrine()->getManager();

        $vacunauser = $em->getRepository('AppBundle:VacunaUser')->findAll();
        //$vacunas = [];
        return $vacunauser
            ? new JsonResponse(['vacunas' => $vacunauser])
            : new JsonResponse(
                new Message(404, 'Not Found'),
                404
            );
    }
}
