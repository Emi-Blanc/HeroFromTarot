<?php

namespace App\DataFixtures;

use App\Entity\CardMaj;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

// class CardMajFixtures extends Fixture
{
    // public function load(ObjectManager $manager)
    // {
    //     for ($i = 0; $i < 22 ; $i++){
    //         $cardMaj = new CardMaj();
    //         $cardMaj->setName ("cardMaj".$i);
    //         $cardMaj->setNumber(rand(0, 22));
    //         $cardMaj->setDescription("gnfjlqglùnh");
    //         $manager->persist ($cardMaj);
    //     }
    //     $manager->flush();
    // }
}

 
 
class CardMajFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cardFou = new CardMaj([
            'name' => "Le Fou",
            'number' => "0",
            'description' => "Une personne libre d'esprit et aventureuse, souvent perçue comme spontanée et créative. Elle est prête à prendre des risques et à explorer l'inconnu avec une curiosité enfantine.",
        ]);

        $cardBateleur = new CardMaj([
            'name' => "Le Bateleur",
            'number' => "1",
            'description' => "Une personne créative et charismatique, qui a le pouvoir de transformer ses idées en réalité. Elle est souvent perçue comme une initiatrice, capable d'inspirer et de motiver les autres.",
        ]);
 
        $cardPapesse = new CardMaj([
            'name' => "La Papesse",
            'number' => "2",
            'description' => "Une personne intuitive et sage, qui valorise la connaissance intérieure et l'introspection. Elle est souvent perçue comme mystérieuse et en connexion avec le monde spirituel.",
        ]);

        $cardImperatrice = new CardMaj([
            'name' => "L'Impératrice'",
            'number' => "3",
            'description' => "Une personne nourrissante et créative, qui valorise la beauté, l'abondance et la nature. Elle est souvent perçue comme une figure maternelle, capable de créer un environnement chaleureux.",
        ]);

        $cardEmpereur = new CardMaj([
            'name' => "L'Empereur'",
            'number' => "4",
            'description' => "Une personne autoritaire et structurée, qui valorise l'ordre et la stabilité. Elle est souvent perçue comme un leader pragmatique, capable de prendre des décisions importantes.",
        ]);

        $cardPape = new CardMaj([
            'name' => "Le Pape",
            'number' => "5",
            'description' => "Une personne sage et spirituelle, qui valorise les traditions et les enseignements. Elle est souvent perçue comme une figure d'autorité morale, apportant guidance et soutien.",
        ]);

        $cardAmoureux = new CardMaj([
            'name' => "Les Amoureux",
            'number' => "6",
            'description' => "Une personne passionnée et équilibrée, qui valorise l'amour et les relations. Elle est souvent perçue comme charismatique et en quête d'harmonie dans ses interactions.",
        ]);

        $cardChariot = new CardMaj([
            'name' => "Le Chariot",
            'number' => "7",
            'description' => "Une personne déterminée et ambitieuse, qui valorise le succès et la conquête. Elle est souvent perçue comme résiliente, capable de surmonter les obstacles sur son chemin.",
        ]);

        $cardErmite = new CardMaj([
            'name' => "L'Ermite'",
            'number' => "9",
            'description' => "Une personne introspective et sage, qui valorise la solitude et la recherche de la vérité. Elle est souvent perçue comme un guide, capable d'apporter une perspective profonde.",
        ]);


        $cardRoueFortune = new CardMaj([
            'name' => "La Roue de la Fortune",
            'number' => "10",
            'description' => "Une personne adaptable et ouverte, qui reconnaît les cycles de la vie. Elle est souvent perçue comme optimiste, capable d'accepter le changement et les fluctuations.",
        ]);

        $cardJustice = new CardMaj([
            'name' => "La Justice",
            'number' => "11",
            'description' => "Une personne équilibrée et juste, qui valorise l'honnêteté et l'équité. Elle est souvent perçue comme un arbitre, capable de prendre des décisions éclairées et impartiales.",
        ]);

        $cardPendu = new CardMaj([
            'name' => "Le Pendu",
            'number' => "12",
            'description' => "Une personne introspective et détachée, qui valorise la réflexion et le lâcher-prise. Elle est souvent perçue comme sage, capable de voir les choses sous un angle différent.",
        ]);

        $cardMort = new CardMaj([
            'name' => "La Mort",
            'number' => "13",
            'description' => "Une personne transformée et résiliente, qui valorise la fin d’un cycle et le renouveau. Elle est souvent perçue comme capable de laisser derrière elle ce qui ne sert plus.",
        ]);

        $cardTemperance = new CardMaj([
            'name' => "La Tempérance",
            'number' => "14",
            'description' => "Une personne équilibrée et harmonieuse, qui valorise la patience et la modération. Elle est souvent perçue comme une médiatrice, capable d'apporter la paix et la tranquillité.",
        ]);

        $cardDiable = new CardMaj([
            'name' => "Le Diable",
            'number' => "15",
            'description' => "Une personne passionnée et charismatique, qui peut être attirée par les plaisirs matériels et les dépendances. Elle est souvent perçue comme intense, avec des luttes intérieures.",
        ]);

        $cardTour = new CardMaj([
            'name' => "La Tour",
            'number' => "16",
            'description' => "Une personne en pleine transformation, souvent perçue comme confrontée à des bouleversements et des crises. Elle est capable de faire face à l'imprévu avec courage et détermination.",
        ]);
      
        $cardEtoile = new CardMaj([
            'name' => "L'Etoile'",
            'number' => "17",
            'description' => "Une personne inspirante et optimiste, qui valorise l'espoir et la spiritualité. Elle est souvent perçue comme une guide, capable d'apporter lumière et inspiration aux autres.",
        ]);

        $cardLune = new CardMaj([
            'name' => "La Lune",
            'number' => "18",
            'description' => "Une ersonne calme et réfléchie, qui valorise l'intuition et les émotions. Elle est souvent perçue comme mystérieuse et apaisante, apportant une aura de sérénité. ",
        ]);

        $cardSoleil = new CardMaj([
            'name' => "Le soleil",
            'number' => "19",
            'description' => "Une personne joyeuse et énergique, qui valorise la positivité et la vitalité. Elle est souvent perçue comme une source de lumière et de bonheur pour son entourage.",
        ]);

        $cardJugement = new CardMaj([
            'name' => "Le Jugement",
            'number' => "20",
            'description' => "Une personne introspective et juste, qui valorise la rédemption et la transformation personnelle. Elle est souvent perçue comme un catalyseur de changement et de renouveau.",
        ]);
        
        $cardMonde = new CardMaj([
            'name' => "Le Monde",
            'number' => "21",
            'description' => "Une personne accomplie et intégrée, qui valorise l'harmonie et l'achèvement. Elle est souvent perçue comme un exemple d'équilibre et de réussite.",
        ]);
       

        $manager->persist($cardFou, $cardBateleur, );
 
        $manager->flush();
    }
}