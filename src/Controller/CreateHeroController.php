<?php

namespace App\Controller;

use App\Entity\CardMaj;
use App\Entity\CardMin;
use App\Entity\CardRoy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateHeroController extends AbstractController
{
    #[Route('/create/hero', name: 'app_create_hero')]
    public function index(): Response
    {
        return $this->render('create_hero/index.html.twig', [
            'controller_name' => 'CreateHeroController',
        ]);
    }

    #[Route('/create/hero/draw', name: 'app_create_hero_draw', methods: ['GET'])]
    public function drawCards(EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer toutes les cartes majeures depuis la base de données
        $cards = $entityManager->getRepository(CardMaj::class)->findAll();

        // Tirer trois cartes aléatoirement
        $randomCards = [];
        if (count($cards) >= 3) {
            $randomKeys = array_rand($cards, 3);
            foreach ($randomKeys as $key) {
                $randomCards[] = [
                    'name' => $cards[$key]->getName(),
                    'number' => $cards[$key] -> getNumber(),
                    'description' => $cards[$key]->getDescription(),
                    'image' => $cards[$key]->getImage(),
                ];
            }
        }

        // Retourner les cartes sous forme de JSON
        return new JsonResponse($randomCards);
    } 
}
