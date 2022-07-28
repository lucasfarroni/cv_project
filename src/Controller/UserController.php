<?php

namespace App\Controller;


use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('user')]
class UserController extends AbstractController
{
    #[Route('/add', name: 'app_user.add')]
    public function addUser(ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();
        $user = new User();
        $user->setFirstname('toto');
        $user->setEmail('toto@hotmail.fr');
        $user->setPassword('toto');
        //Ajouter l'operation de la personne dans ma transaction si on lui precise l'id on pourras modifier un user en ^particulier
        $entityManager->persist($user);
        $entityManager->flush();
        //execute la transaction
        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }

   /* #[Route('/', name: 'app_user.list')]
    public function UserList(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(User::class);
        $user  = $repository->findAll();
    }
    retur*/
}
