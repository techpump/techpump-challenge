<?php

namespace App\Controller;

use App\Service\APIService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        return $this->render('home/show.html.twig');
    }

    /**
     * @Route("/challenge")
     * @param Request $request
     * @param APIService $apiService
     * @return JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function challenge(Request $request, APIService $apiService): JsonResponse
    {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $country = $request->request->get('country');

        $response = $apiService->sendToken($name, $email, $country);
        if ($response === false) {
            return new JsonResponse([], Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse(['message' => $response]);
    }
}
