<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemarcheEnLigneController extends AbstractController
{
    #[Route('/demarche/en/ligne', name: 'demarche_en_ligne')]
    public function index(): Response
    {
        return $this->render('demarche_en_ligne/index.html.twig', [
            'controller_name' => 'DemarcheEnLigneController',
        ]);
    }
}
