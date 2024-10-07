<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Repository\CardMajRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\HeroRepository; // Assurez-vous d'importer le repository des héros

class SaveYourHeroController extends AbstractController
{
    #[Route('/save-hero', name: 'app_save_hero', methods: ['POST'])]
public function saveHero(Request $request, CardMajRepository $cardMajRepository, EntityManagerInterface $entityManager): JsonResponse
{
    // Vérifier si la requête est de type POST
    if ($request->isMethod('POST')) {
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

    // Si la requête est de type GET, retourner une réponse appropriée
    return new JsonResponse(['message' => 'Envoyez une requête POST pour sauvegarder un héros.']);
}

#[Route('/your-heroes', name: 'app_your_heroes')]
public function yourHeroes(HeroRepository $heroRepository): Response
{
    // Récupérer tous les héros
    $heroes = $heroRepository->findAll();

    return $this->render('save_your_hero/index.html.twig', [
        'heroes' => $heroes,
    ]);
}
}
