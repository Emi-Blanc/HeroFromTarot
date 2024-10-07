<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateHeroController extends AbstractController
{
    #[Route('/create/hero', name: 'app_create_hero')]
    public function index(): Response
    {
        return $this->render('create_hero/index.html.twig', [
            'controller_name' => 'CreateHeroController',
        ]);
    }
}
