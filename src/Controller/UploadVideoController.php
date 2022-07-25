<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\callApi;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UploadVideoController extends AbstractController
{

    #[Route('/upload/video', name: 'app_upload_video')]
    public function index(HttpClientInterface $httpClient): Response
    {
        $response = $httpClient->request('GET','http://172.24.0.3/api/video_for_cvs');
         dd($response);
        return $this->render('upload_video/index.html.twig', [
            'controller_name' => 'UploadVideoController',
        ]);
    }
}
