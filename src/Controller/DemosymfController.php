<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;


class DemosymfController extends AbstractController
{
    /**
     * @Route("/demosymf", name="demosymf")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        /*  exemples :
        $article = $repo->find(12);     => affiche l'article 12
        $article = $repo->findOneByTitle('Titre de l\'article');     => affiche l'article
        $articles = $repo->findByTitle('Titre de l\'article');     => affiche tous les articles qui ont ce titre (partiel ?)
        */
        $articles = $repo->findAll();       //=> affiche tous les articles
        

        return $this->render('demosymf/index.html.twig', [
            'controller_name' => 'DemosymfController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('demosymf/home.html.twig', [
            'title' => "Bienvenue à Poudlard",
            'age' => 31
        ]);
    }

    /**
     * @Route("/demosymf/{id}", name="demosymf_show")
     */

    public function show($id) {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $article = $repo->find($id);

        return $this->render('demosymf/show.html.twig');
    }
}


