<?php
namespace App\Controller;

use App\Entity\Hero;
use App\Repository\CardMajRepository;
use App\Repository\CardRoyRepository;
use App\Repository\CardMinRepository;
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
        CardRoyRepository $cardRoyRepository,
        CardMinRepository $cardMinRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        if ($request->isMethod('POST')) {
            $data = json_decode($request->getContent(), true);
            
            // Debug: afficher les données reçues
            error_log(print_r($data, true)); 
    
            $hero = new Hero();
            $hero->setName($data['name']);
    
            // Ajout des cartes majeures
            foreach ($data['cardMajs'] as $cardId) {
                $cardMaj = $cardMajRepository->find($cardId);
                if ($cardMaj) {
                    $hero->addCardMaj($cardMaj);
                    error_log("Carte majeure ajoutée: " . $cardId);
                } else {
                    error_log("Carte majeure non trouvée: " . $cardId);
                }
            }
    
            // Ajout des cartes royales
            foreach ($data['cardRoys'] as $cardId) {
                $cardRoy = $cardRoyRepository->find($cardId);
                if ($cardRoy) {
                    $hero->addCardRoy($cardRoy);
                    error_log("Carte royale ajoutée: " . $cardId);
                } else {
                    error_log("Carte royale non trouvée: " . $cardId);
                }
            }
    
            // Ajout des cartes mineures
            foreach ($data['cardMins'] as $cardId) {
                $cardMin = $cardMinRepository->find($cardId);
                if ($cardMin) {
                    $hero->addCardMin($cardMin);
                    error_log("Carte mineure ajoutée: " . $cardId);
                } else {
                    error_log("Carte mineure non trouvée: " . $cardId);
                }
            }
    
            // Associer l'utilisateur connecté au héros
            $user = $this->getUser();
            if ($user) {
                $hero->setUser($user);
            }
    
            try {
                $entityManager->persist($hero);
                $entityManager->flush();
                return new JsonResponse(['status' => 'Héros sauvegardé!']);
            } catch (\Exception $e) {
                error_log("Erreur lors de la sauvegarde du héros: " . $e->getMessage());
                return new JsonResponse(['status' => 'Erreur lors de la sauvegarde du héros.'], 500);
            }
        }
    
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
    public function heroDetail($id, EntityManagerInterface $entityManager): Response
    {
        $hero = $entityManager->getRepository(Hero::class)->find($id);

    if (!$hero) {
        throw $this->createNotFoundException('Héros non trouvé');
    }
    
        return $this->render('save_your_hero/detail.html.twig', [
            'hero' => $hero,
            'cardMajs' => $hero->getCardMajs(),
            'cardRoys' => $hero->getCardRoys(),
            'cardMins' => $hero->getCardMins(),
        ]);
    }
}