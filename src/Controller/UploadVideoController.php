<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\callApi;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UploadVideoController extends AbstractController
{
/*
    #[Route('/upload/video', name: 'app_upload_video')]
    public function index(HttpClientInterface $httpClient): Response
    {
        $response = $httpClient->request('GET','http://172.24.0.3/api/video_for_cvs');
         dd($response);
        return $this->render('upload_video/index.html.twig', [
            'controller_name' => 'UploadVideoController',
        ]);
    }*/
    #[Route('/upload/video', name: 'app_upload_video')]

    public function postImage(Request $request): Response
    {
        dump($request);
        $files = $request->files->get('image');
        if (isset($files)) {
            $ch = curl_init();
            $cfile = new \CURLFile($files, $files);
            $data = array("myimage" => $cfile);
            curl_setopt($ch, CURLOPT_URL, );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_exec($ch);
        }
        dd('no file');
    }


}

