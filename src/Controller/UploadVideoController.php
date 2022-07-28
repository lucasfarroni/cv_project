<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\callApi;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UploadVideoController extends AbstractController
{

    #[Route('/upload/video', name: 'app_upload_video',methods:['GET'])]
    public function index(HttpClientInterface $httpClient): Response
    {
        $response = $httpClient->request('GET', 'http://172.24.0.10/api/video_for_cvs', [
            'headers' => [
                'Accept' => 'application/json'
                ]
            ]);
        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
       // dd($statusCode);
       dd($content);
       // dd($response);



        return $this->render('upload_video/index.html.twig', [
            'controller_name' => 'UploadVideoController',
        ]);
    }

    #[Route('/post', name:'app_upload_video/post', methods:["POST"])]
    public function postTest(HttpClientInterface $httpClient): Response
    {
       /* $response = $httpClient->request('POST', 'http://172.24.0.10/api/video_for_cvs',[
            'data' =>           "title": "yolo",
                                "description": "stringurrr",
                                "url": "string"
        ]);
*/
    }


}
    /*
    #[Route('/upload/video', name: 'app_upload_video')]

    public function postImage(Request $request): Response
    {
        dump($request);
        /** @var UploadedFile $files
        $files = $request->files->get('image');
        dump($files);
        if (isset($files)) {
            $ch = curl_init();
            $cfile = new \CURLFile($files->getRealPath(), $files->getMimeType(), $files->getClientOriginalName());
            $data = array("myimage" => $cfile);
            dump($data);

            curl_setopt($ch, CURLOPT_URL,'http://172.24.0.10/api/video_for_cvs' );


            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $response = curl_exec($ch);
        }
        if($response === true){
            echo"file posted";
        }else{
            echo "Error" , curl_error($ch);
        }
        return $this->render('home/index.html.twig');

    }


}
*/
