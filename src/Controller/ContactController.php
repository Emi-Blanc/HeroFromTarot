<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $req, ManagerRegistry $doctrine): Response
    {
        $contact = new Contact();
        $formulaireContact = $this -> createForm(ContactType::class, $contact);
        $formulaireContact -> handleRequest($req);
        if ($formulaireContact->isSubmitted() && $formulaireContact->isValid()){
            $em=$doctrine->getManager();
            $em->persist($contact);
            $em->flush();
        };

        $vars = ["unFormulaire"=>$formulaireContact];
        return $this->render('contact/index.html.twig', $vars);
    }
}
