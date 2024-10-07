<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Repository\CardMajRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SaveYourHeroController extends AbstractController
{
    #[Route('/save-hero', name: 'app_save_hero', methods: ['POST'])]
    public function saveHero(Request $request, CardMajRepository $cardMajRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        // Créer une nouvelle instance de Hero
        $hero = new Hero();
        $hero->setName($data['name']);

        // Récupérer les cartes tirées
        foreach ($data['cards'] as $cardId) {
            $card = $cardMajRepository->find($cardId);
            if ($card) {
                $hero->addCard($card);
            }
        }

        // Persister l'entité
        $entityManager->persist($hero);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Héros sauvegardé!']);
    }
}
