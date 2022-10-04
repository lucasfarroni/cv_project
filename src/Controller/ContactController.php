<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request , EntityManagerInterface $manager): Response
    {

        $contact = new Contact();
        $date = new \DateTimeImmutable();
        $contact = $contact->setCreatedAt($date);
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $manager->persist($contact);

            $manager->flush();
           $this->AddFlash(
               'success','message envoyé'
           );
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
