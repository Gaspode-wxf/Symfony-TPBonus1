<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(EntityManagerInterface $entityManager) : Response
    {

        $produits = $entityManager->getRepository('App:Produit')->findAll();
        return $this->render('main/index.html.twig',[
            'controller_name' => 'MainController',
            'produits' => $produits,
        ]);
    }






   /* *
     * @Route("/main", name="main")
     */
   /* public function index(): Response
    {
        return $this->render('main/categorie.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }*/
}
