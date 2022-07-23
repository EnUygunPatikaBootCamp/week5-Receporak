<?php

namespace App\Controller;

use App\Service\CurlService;
use App\Service\TeamPointGetter;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomePageController extends AbstractController
{

    /**
     * @Route("/", name="homepage", methods={"GET"})
     * return Response
     */
    public function index(TeamPointGetter $teamPointGetter): Response
    {
        // Servis çalıştırıldı.
        $teamPoints= $teamPointGetter->getAllTeams(new CurlService());

        // Servis içerisindeki verileri view'a gönderildi
        return $this->render('home_page/index.html.twig', [
            'teamPoints' => $teamPoints
        ]);
    }
}