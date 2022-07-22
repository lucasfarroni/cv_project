<?php

namespace App\Controller;

use App\Entity\Projets;
use App\Repository\ProjetsRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetsController extends AbstractController
{
    #[Route('/projets', name: 'projets.list')]
    public function index(ProjetsRepository $repository): Response
    {

   /* $repository = $doctrine->getRepository(Projets::class);
    $projets=$repository->findAll();*/
    return $this->render('projets/index.html.twig',
        [
            'projets' => $repository->findAll()
        ]
    );

    }
}
