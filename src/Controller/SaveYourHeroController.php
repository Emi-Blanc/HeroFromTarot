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
use App\Repository\HeroRepository;

class SaveYourHeroController extends AbstractController
{
    #[Route('/save-hero', name: 'app_save_hero', methods: ['POST'])]
    public function saveHero(
        Request $request, 
        CardMajRepository $cardMajRepository, 
        EntityManagerInterface $entityManager
    ): JsonResponse {
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

            // Associer l'utilisateur connecté au héros
            $user = $this->getUser();
            if ($user) {
                $hero->setUser($user); // Associe le héros à l'utilisateur connecté
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
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        // Si l'utilisateur est connecté, récupérer ses héros, sinon une liste vide
        $heroes = [];
        if ($user) {
            $heroes = $heroRepository->findBy(['user' => $user]);
        }

        return $this->render('save_your_hero/index.html.twig', [
            'heroes' => $heroes,
        ]);
    }

    #[Route('/hero/{id}', name: 'app_hero_detail')]
public function heroDetail(Hero $hero): Response
{
    // Récupérer les cartes associées à ce héros
    $cards = $hero->getCards();

    return $this->render('save_your_hero/detail.html.twig', [
        'hero' => $hero,
        'cards' => $cards,
    ]);
}
}