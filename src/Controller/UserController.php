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
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
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
