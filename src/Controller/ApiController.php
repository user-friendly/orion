<?php
namespace Orion\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
  
  #[Route('/api/learning-api/demos/capstone/users', name: 'api_users', methods: [
    'GET', 'OPTIONS'
  ])]
  public function getUsers(Request $request): JsonResponse {
    $headers = [
      'Access-Control-Allow-Origin' => '*',
      'X-Orion-Api-Version' => '0.1.0-experimental1',
    ];
    
    if ('OPTIONS' == $request->getMethod()) {
      return new JsonResponse(NULL, Response::HTTP_OK, \array_merge([
            'Access-Control-Allow-Method' => 'OPTIONS, GET, POST, PUT',
            'Access-Control-Allow-Headers' => 'X-PINGOTHER, Content-Type, Authorization',
            'Access-Control-Allow-Credentials' => 'true',
            // For 15 minutes.
            'Access-Control-Max-Age' => '900',
          ],
          $headers
        ));
    }
    
    // Check for the super secret key.
    if ('Bearer browser-mock-api-key' != $request->headers->get('authorization')) {
      return new JsonResponse(NULL, Response::HTTP_FORBIDDEN, $headers);
    }
    
    $data = [
      [
        "id" => "c7b3d8e0-5e0b-4b0f-8b3a-3b9f4b3d3b3d",
        "firstName" => "John",
        "lastName" => "Doe",
      ],
      [
        "id" => 'd6762ea2-d0db-4b2e-a6c8-167a2ebb1208',
        "firstName" => "Jane",
        "lastName" => "Doe",
      ],
    ];
    
    return new JsonResponse($data, Response::HTTP_OK, $headers);
  }
}
