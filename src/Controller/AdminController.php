<?php
namespace Orion\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController {

  #[Route('/admin', name: 'admin', methods: ['GET'])]
  public function getAdmin() : Response {
    
    ob_start();
    phpinfo();
    $output = ob_get_flush();
    
    return new Response($output);
  }
}
