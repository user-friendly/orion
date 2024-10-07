<?php
namespace Orion\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController {

  #[Route('/api', name: 'api', methods: [
    'GET'
  ])]
  public function getRoot(): JsonResponse {
    $data = [
      'status' => '500',
      'message' => 'TODO Implement service',
      'example' => [1, 2, 3.5, '123', 'Hello!', new \stdClass()]
    ];

    return new JsonResponse($data, Response::HTTP_INTERNAL_SERVER_ERROR);
  }
}
