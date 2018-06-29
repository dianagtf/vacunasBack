<?php
/**
 * Created by PhpStorm.
 * User: Diana
 * Date: 29/06/2018
 * Time: 10:13
 */

namespace AppBundle\Controller;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

use AppBundle\Entity\Message;
use AppBundle\Entity\RegistroVacunas;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\Criteria;

/**
 * Class APIRegistroVacunasController
 * @package Vacunas\VacunasBack\AppBundle\Controller
 *
 * @Route("/api/v1/registrovacunas");
 */
class APIRegistroVacunasController extends Controller
{
    /**
     * @Route("", name="registrovacunas_cget");
     * @Method("GET")
     */
    public function cgetAPIRegistroVacunasAction(){

        $em = $this->getDoctrine()->getManager();

        $registrovacunas = $em->getRepository('AppBundle:RegistroVacunas')->findAll();
        //$vacunas = [];
        return $registrovacunas
            ? new JsonResponse(['registrovacunas' => $registrovacunas])
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
     * @Route("", name="registrovacunas_cpost")
     * @Method(Request::METHOD_POST)
     */
    public function postRegistroVacunasAction(Request $request)
    {
        $body = $request->getContent(false);
        $postData = json_decode($body, true);


        $entityManager = $this->getDoctrine()->getManager();

        // 201 - Created
        $vacunas = new RegistroVacunas(
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
        $entityManager->persist($vacunas);
        $entityManager->flush();

        return new JsonResponse($vacunas, Response::HTTP_CREATED);
    }

    /**
     * Summary: Updates a registrovacunas
     * Notes: Updates the user identified by &#x60;userId&#x60;.
     *
     * @param Request $request request
     * @param int     $id  RegistroVacunas id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", name="put_registrovacunas", requirements={"id": "\d+"})
     * @Method("PUT")
     */
    public function putRegistroVacunasAction(Request $request, int $id)
    {
        $body = $request->getContent(false);
        $postData = json_decode($body, true);

        $entityManager = $this->getDoctrine()->getManager();
        $registrovacunas = $entityManager
            ->getRepository(RegistroVacunas::class)
            ->findOneBy(['id' => $id]);

        if (null == $registrovacunas) {    // 404 - Not Found
            return new JsonResponse(
                new Message(Response::HTTP_NOT_FOUND, Response::$statusTexts[404]),
                Response::HTTP_NOT_FOUND
            );
        }

        if (isset($postData['isVacunated1'])) {
            /* @var \Doctrine\Common\Collections\Criteria $criteria */

            if (isset($postData['age'])) {
                $registrovacunas->setIsVacunated1($postData['isVacunated1']);
                $registrovacunas->setIsVacunated2($postData['isVacunated2']);
                $registrovacunas->setIsVacunated3($postData['isVacunated3']);
                $registrovacunas->setIsVacunated4($postData['isVacunated4']);
                $registrovacunas->setIsVacunated5($postData['isVacunated5']);
                $registrovacunas->setIsVacunated6($postData['isVacunated6']);
                $registrovacunas->setDateVacuna1($postData['dateVacuna1']);
                $registrovacunas->setDateVacuna2($postData['dateVacuna2']);
                $registrovacunas->setDateVacuna3($postData['dateVacuna3']);
                $registrovacunas->setDateVacuna4($postData['dateVacuna4']);
                $registrovacunas->setDateVacuna5($postData['dateVacuna5']);
                $registrovacunas->setDateVacuna6($postData['dateVacuna6']);
            }
        }
        $entityManager->merge($registrovacunas);
        $entityManager->flush();

        return new JsonResponse($registrovacunas, 209);    // 209 - Content Returned
    }


    /**
     * Summary: Provides the list of HTTP supported methods
     * Notes: Return a &#x60;Allow&#x60; header with a list of HTTP supported methods.
     *
     * @param int $id RegistroVacunas id
     *
     * @return JsonResponse
     *
     * @Route(
     *     "/{id}",
     *     name = "options_registrovacunas",
     *     defaults = {"id" = 1},
     *     requirements = {"id": "\d+"}
     *     )
     * @Method("OPTIONS")
     */
    public function optionsRegistroVacunasAction(int $id)
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
     * Summary: Returns a registrovacunas based on a single ID
     * Notes: Returns the registrovacunas identified by &#x60;userId&#x60;.
     *
     * @param int $id RegistroVacunas id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", name="cget_registrovacunas_by_id", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function getRegistroVacunasAction(int $id)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:RegistroVacunas');
        $registrovacunas = $repo->findOneBy(['id' => $id]);

        return empty($registrovacunas)
            ? new JsonResponse(
                new Message(Response::HTTP_NOT_FOUND, Response::$statusTexts[404]),
                Response::HTTP_NOT_FOUND
            )
            : new JsonResponse($registrovacunas);
    }
}