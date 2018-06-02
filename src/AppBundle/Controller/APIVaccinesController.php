<?php

namespace AppBundle\Controller;

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
 * @Route("/api/v1/vacunas");
 */

class APIVaccinesController extends Controller
{
    /**
     * @Route("", name="vacunas_cget");
     * @Method("GET")
     */
    public function cgetAPIVaccinesAction(){

        $em = $this->getDoctrine()->getManager();

        $vacunas = $em->getRepository('AppBundle:Vacunas')->findAll();
        //$vacunas = [];
        return $vacunas
            ? new JsonResponse(['vacunas' => $vacunas])
            : new JsonResponse(
                new Message(404, 'Not Found'),
                404
            );
    }
}