<?php

namespace App\Controller;

use App\Entity\ArticleTwig;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\ArticleTwigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    private $articleTwigRepository;

    public function __construct(ArticleTwigRepository $articleTwigRepository)
    {
        $this->articleTwigRepository = $articleTwigRepository;
    }

    /**
     * @Route("/articles/{id}", name="show")
     * @param ArticleTwig $article
     * @param Request $request
     * @return Response
     */
    public function show(ArticleTwig $article, Request $request)
    {
        $commentForm = $this->createForm(CommentType::class);
        // le formulaire prend la requête et va récupérer à lintérieur les champs
        // remplis par le formulaire HTML
        $commentForm->handleRequest($request);

        // Si le formulaire a été soumis et est valide
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            // on récupère l'objet Comment créé par le formulaire
            /** @var Comment $comment */
            $comment = $commentForm->getData();

            // on associe le commentaire à l'article et on défini la date de création
            $comment
                ->setArticle($article)
                ->setCreatedAt(new \DateTime())
            ;

            // on recupère le l'EntityManager de Doctrine qui va nous servir à sauvegarder notre commentaire en base de données
            $manager = $this->getDoctrine()->getManager();

            // le persist dit a Doctrine de conidérer cet Objet comme un objet à sauvegarder en base, l'objet est donc maintenant
            // géré par Doctrine
            $manager->persist($comment);
            // le flush dit à Doctrine d'exécuter les requêtes SQL permettant de créer/modifier les objets sur lesquels
            // on appelé ->persist()
            $manager->flush();

            // redirige vers la page actuelle (la redirection permet d'éviter qu'en actualisant la page, cela soumette
            // à nouveau le formulaire
            return $this->redirectToRoute('show', ['id' => $article->getId()]);
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'commentForm' => $commentForm->createView()
        ]);
    }
}
