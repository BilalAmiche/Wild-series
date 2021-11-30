<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class ProgramController extends AbstractController
{
    /**
     * @Route("/program/", name="program_index")
     */
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /**
    * @Route("/program/{page}", requirements={"page"="\d+"}, name="program_show")
    */
    public function show(int $page = 1): Response
    {
        return $this->render('program/show.html.twig', ['page' => $page]);
    }

    public function new(): Response
    {
    // traitement d'un formulaire par exemple

    // redirection vers la page 'program_show',
    // correspondant à l'url /program/4
    return $this->redirectToRoute('program_show', ['id' => 4]);
    }
}