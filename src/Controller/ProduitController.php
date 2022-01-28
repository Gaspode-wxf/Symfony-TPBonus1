<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit", name="produit_")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function list(EntityManagerInterface $entityManager) : Response
    {

        $produits = $entityManager->getRepository('App:Produit')->findAll();
        return $this->render('produit/produit.html.twig',[

            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(EntityManagerInterface $entityManager, Request $request) : Response
    {
        //init produit
        $produit = new Produit();

        //init form

        $produitForm = $this->createForm(ProduitType::class,$produit);

        // hydrate
        $produitForm->handleRequest($request);

        // verif form

        if($produitForm->isSubmitted())
        {
            $entityManager->persist($produit);
            $entityManager->flush();
            return $this->redirectToRoute('main_home',[


            ]);
        }

        return $this->renderForm('produit/create.html.twig',[
            'produitForm'=>$produitForm,
        ]);


    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail(EntityManagerInterface $entityManager, int $id) : Response
    {

        $produit = $entityManager->getRepository('App:Produit')->find($id);
        return $this->render('produit/detail.html.twig',[

            'produit' => $produit,
        ]);
    }
    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifier(EntityManagerInterface $entityManager, int $id, Request $request) : Response
    {
        //init produit
        $produit = $entityManager->getRepository('App:Produit')->find($id);

        //init form

        $produitForm = $this->createForm(ProduitType::class,$produit);

        // hydrate
        $produitForm->handleRequest($request);

        // verif form

        if($produitForm->isSubmitted())
        {

            $entityManager->persist($produit);
            $entityManager->flush();
            return $this->redirectToRoute('main_home',[


            ]);
        }

        return $this->renderForm('produit/modifier.html.twig',[
            'produitForm'=>$produitForm,
            'produit'=> $produit
        ]);


    }



}
