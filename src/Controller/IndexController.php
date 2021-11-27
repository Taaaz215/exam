<?php

namespace App\Controller;


use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{

    /**
     * @Route("/index", name="index")
     * @param EtudiantRepository $etudiantRepository
     * @param VilleRepository $villeRepository
     * @return Response
     */
    public function index(EtudiantRepository $etudiantRepository, VilleRepository $villeRepository): Response
    {

            return $this->render('index/index.html.twig', ['etudiants' => $etudiantRepository->findAll()]);

    }
}