<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'Pierre',
        ]);
    }

    #[Route('/{id}', name: 'app_show_post', requirements:  ['id' => '\d+'])]
    public function showPost(int $id): Response
    {
        $response = new Response('Mon article numéro ' . $id);
        return $response;
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig');
    }
}
