<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/add_user", name="add_user")
     */
    public function addUser(Request $request): Response
    {
        ////on crée un objet de type user
        $user = new User;

        /////on crée le formulaire à partir du formulaire UserType
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) 
        {
            $this->em->persist($user);
            $this->em->flush();
        }

        return $this->render('user/inscription.html.twig', [
            'userForm' => $form->createView(),
            'user' => $user
        ]);
    }
}
