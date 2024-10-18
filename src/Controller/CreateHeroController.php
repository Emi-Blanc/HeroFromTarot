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
    // Récupérer toutes les cartes depuis la base de données
    $cardMajs = $entityManager->getRepository(CardMaj::class)->findAll();
    $cardRoys = $entityManager->getRepository(CardRoy::class)->findAll();
    $cardMins = $entityManager->getRepository(CardMin::class)->findAll();

    // Vérifier qu'il y a bien des cartes disponibles dans chaque catégorie
    if (count($cardMajs) > 0 && count($cardRoys) > 0 && count($cardMins) > 0) {
        // Tirer une carte aléatoire de chaque catégorie
        $randomCardMaj = $cardMajs[array_rand($cardMajs)];
        $randomCardRoy = $cardRoys[array_rand($cardRoys)];
        $randomCardMin = $cardMins[array_rand($cardMins)];

        // Préparer le résultat pour chaque type de carte
        $randomCards = [
            'maj' => [
                'name' => $randomCardMaj->getName(),
                'number' => $randomCardMaj->getNumber(),
                'description' => $randomCardMaj->getDescription(),
                'image' => $randomCardMaj->getImage(),
            ],
            'roy' => [
                'name' => $randomCardRoy->getNom(),
                'suite' => $randomCardRoy->getSuite(),
                'description' => $randomCardRoy->getDescription2(),
                'image' => $randomCardRoy->getImage2(),
            ],
            'min' => [
                'numero' => $randomCardMin->getNumero(),
                'suite' => $randomCardMin->getSuite2(),
                'qualite' => $randomCardMin->getQualite(),
                'defaut' => $randomCardMin->getDefaut(),
                'image' => $randomCardMin->getImage3(),
            ],
        ];

        // Retourner les cartes sous forme de JSON
        return new JsonResponse($randomCards);
    } else {
        // Gérer le cas où il n'y a pas assez de cartes dans une des catégories
        return new JsonResponse(['error' => 'Not enough cards available'], 400);
    }
}
}
