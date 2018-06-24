<?php

namespace AppBundle\Controller;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


use AppBundle\Entity\Message;
use AppBundle\Entity\VacunaEdad;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\Criteria;

/**
 * Class APIVacunaEdadController
 * @package Vacunas\VacunasBack\AppBundle\Controller
 *
 * @Route("/api/v1/vacunaedad");
 */

class APIVacunaEdadController extends Controller
{
    /**
     * @Route("", name="vacunaedad_cget");
     * @Method("GET")
     */
    public function cgetAPIVacunaEdadAction(){

        $em = $this->getDoctrine()->getManager();

        $vacunaedad = $em->getRepository('AppBundle:VacunaEdad')->findAll();
        //$vacunas = [];
        return $vacunaedad
            ? new JsonResponse(['vacunaedad' => $vacunaedad])
            : new JsonResponse(
                new Message(404, 'Not Found'),
                404
            );
    }

    /**
     * POST action
     *
     * @param Request $request request
     *
     * @return JsonResponse
     *
     * @Route("", name="vacunaedad_cpost")
     * @Method(Request::METHOD_POST)
     */
    public function postVacunaEdadAction(Request $request)
    {
        $body = $request->getContent(false);
        $postData = json_decode($body, true);


        $entityManager = $this->getDoctrine()->getManager();

        // 201 - Created
        $user = new VacunaEdad(
            $postData['name'],
            $postData['age'],
            $postData['edad'],
            $postData['vacuna1'],
            $postData['vacuna2'],
            $postData['vacuna3'],
            $postData['vacuna4'],
            $postData['vacuna5'],
            $postData['vacuna6'],
            $postData['isVacunated1'],
            $postData['isVacunated2'],
            $postData['isVacunated3'],
            $postData['isVacunated4'],
            $postData['isVacunated5'],
            $postData['isVacunated6'],
            $postData['dateVacuna1'],
            $postData['dateVacuna2'],
            $postData['dateVacuna3'],
            $postData['dateVacuna4'],
            $postData['dateVacuna5'],
            $postData['dateVacuna6']
        );
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Summary: Updates a vacunaedad
     * Notes: Updates the user identified by &#x60;userId&#x60;.
     *
     * @param Request $request request
     * @param int     $id  VacunaEdad id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", name="put_vacunaedad", requirements={"id": "\d+"})
     * @Method("PUT")
     */
    public function putVacunaEdadAction(Request $request, int $id)
    {
        $body = $request->getContent(false);
        $postData = json_decode($body, true);

        $entityManager = $this->getDoctrine()->getManager();
        $vacunaedad = $entityManager
            ->getRepository(VacunaEdad::class)
            ->findOneBy(['id' => $id]);

        if (null == $vacunaedad) {    // 404 - Not Found
            return new JsonResponse(
                new Message(Response::HTTP_NOT_FOUND, Response::$statusTexts[404]),
                Response::HTTP_NOT_FOUND
            );
        }

        if (isset($postData['isVacunated1'])) {
            /* @var \Doctrine\Common\Collections\Criteria $criteria */

            if (isset($postData['age'])) {
                $vacunaedad->setIsVacunated1($postData['isVacunated1']);
            }
        }
        $entityManager->merge($vacunaedad);
        $entityManager->flush();

        return new JsonResponse($vacunaedad, 209);    // 209 - Content Returned
    }


    /**
     * Summary: Provides the list of HTTP supported methods
     * Notes: Return a &#x60;Allow&#x60; header with a list of HTTP supported methods.
     *
     * @param int $id VacunaEdad id
     *
     * @return JsonResponse
     *
     * @Route(
     *     "/{id}",
     *     name = "options_vacunaedad",
     *     defaults = {"id" = 1},
     *     requirements = {"id": "\d+"}
     *     )
     * @Method("OPTIONS")
     */
    public function optionsVacunaEdadAction(int $id)
    {
        $methods = ($id)
            ? ['GET', 'PUT', 'DELETE']
            : ['GET', 'POST'];

        return new JsonResponse(
            null,
            Response::HTTP_OK,
            ['Allow' => implode(', ', $methods)]
        );
    }

    /**
     * Summary: Returns a user based on a single ID
     * Notes: Returns the user identified by &#x60;userId&#x60;.
     *
     * @param int $id VacunaEdad id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", name="cget_vacunaedad_by_id", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function getVacunaEdadAction(int $id)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:VacunaEdad');
        $user = $repo->findOneBy(['id' => $id]);

        return empty($user)
            ? new JsonResponse(
                new Message(Response::HTTP_NOT_FOUND, Response::$statusTexts[404]),
                Response::HTTP_NOT_FOUND
            )
            : new JsonResponse($user);
    }
}
