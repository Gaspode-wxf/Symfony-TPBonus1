<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/categorie", name="categorie_")
 */
class CategorieController extends AbstractController
{
    /**
 * @Route("/", name="list")
 */
    public function list(EntityManagerInterface $entityManager) : Response
    {

        $categories = $entityManager->getRepository('App:Categorie')->findAll();
        return $this->render('categorie/categorie.html.twig',[
            'controller_name' => 'CategoriesController',
            'categories' => $categories,
        ]);
    }


}
