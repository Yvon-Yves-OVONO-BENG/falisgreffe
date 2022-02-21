<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdresseController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/add_adresse", name="add_adresse")
     */
    public function index(Request $request): Response
    {
        $adresse = new Adresse;

        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) 
        {
            $this->em->persist($adresse);
            $this->em->flush();
        }

        return $this->render('adresse/adresse.html.twig', [
            'formAdresse' => $form->createView(),
            '$adresse' => $adresse
        ]);
    }
}
