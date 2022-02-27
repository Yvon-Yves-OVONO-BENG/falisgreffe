<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\SocieteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/societe')]
class SocieteController extends AbstractController
{
    #[Route('/save', name: 'societe_save')]
    public function save(Request $request): Response
    {
        $societe = new Societe;

        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

        }
        return $this->render('societe/save.html.twig', [
            'societeForm' => $form->createView()
        ]);
    }
}
