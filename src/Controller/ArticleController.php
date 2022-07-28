<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/article/new', name: 'add_article')]
    public function add(Request $request,ManagerRegistry $doctrine): Response
    {

      $article = new article();
      $articleform = $this-> createForm(ArticleType::class, $article);



        $articleform->handleRequest($request);//lorsque le form est submit recup la request
        if ($articleform->isSubmitted() && $articleform->isValid()) {

            $article = $articleform->getData();

            $em = $doctrine->getManager();
            $em->persist($article);
            $em->flush();

            //echo 'Envoyé';
        }


      return $this->renderForm('article/index.html.twig',[
          'articleform' => $articleform//renvoie la var article form dans le twig
      ]);

    }
}
