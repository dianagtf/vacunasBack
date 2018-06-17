<?php

namespace AppBundle\Controller;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, POST, GET, PATCH, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization');

use AppBundle\AppBundle;
use AppBundle\Entity\Message;
use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\Criteria;


/**
 * Class APIUsersController
 * @package Vacunas\VacunasBack\AppBundle\Controller
 *
 * @Route("/api/v1/users");
 */

class APIUsersController extends Controller
{
    /**
     * @Route("", name="users_cget");
     * @Method("GET")
     */
    public function cgetAPIUsersAction(){

        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Users')->findAll();
        return $users
            ? new JsonResponse(['users' => $users])
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
     * @Route("", name="users_cpost")
     * @Method(Request::METHOD_POST)
     */
    public function postUserAction(Request $request)
    {
        $body = $request->getContent(false);
        $postData = json_decode($body, true);

        if (!isset($postData['username'], $postData['firstName'])) { // 422 - Unprocessable Entity Faltan datos

            return new JsonResponse(
                new Message(
                    Response::HTTP_UNPROCESSABLE_ENTITY,
                    Response::$statusTexts[422]
                ),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $entityManager = $this->getDoctrine()->getManager();

        // hay datos -> procesarlos
        /* @var \Doctrine\Common\Collections\Criteria $criteria */
        $criteria = new Criteria();
        $criteria
            ->where($criteria::expr()->eq('username', $postData['username']))
            ->orWhere($criteria::expr()->eq('firstName', $postData['firstName']));
        $user_exist = $entityManager
            ->getRepository('AppBundle:Users')
            ->matching($criteria);

        if (count($user_exist)) {    // 400 - Bad Request

            return new JsonResponse(
                new Message(
                    Response::HTTP_BAD_REQUEST,
                    Response::$statusTexts[400]
                ),
                Response::HTTP_BAD_REQUEST
            );
        }

        // 201 - Created
        $user = new Users(
            $postData['id'],
            $postData['username'],
            $postData['firstName'],
            $postData['lastName'],
            $postData['password']
        );
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Summary: Provides the list of HTTP supported methods
     * Notes: Return a &#x60;Allow&#x60; header with a list of HTTP supported methods.
     *
     * @param int $userId User id
     *
     * @return JsonResponse
     *
     * @Route(
     *     "/{userId}",
     *     name = "options_users",
     *     defaults = {"userId" = 1},
     *     requirements = {"userId": "\d+"}
     *     )
     * @Method(Request::METHOD_OPTIONS)
     */
    public function optionsUserAction(int $userId)
    {
        $methods = ($userId)
            ? ['GET', 'PUT', 'DELETE']
            : ['GET', 'POST'];

        return new JsonResponse(
            null,
            Response::HTTP_OK,
            ['Allow' => implode(', ', $methods)]
        );
    }
}
