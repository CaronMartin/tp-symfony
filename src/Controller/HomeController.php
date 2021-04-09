<?php

namespace App\Controller;


use App\Repository\ArticleTwigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $articleTwigRepository;

    public function __construct(ArticleTwigRepository $articleTwigRepository)
    {
        $this->articleTwigRepository = $articleTwigRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'articles' => $this->articleTwigRepository->findLast(4)
        ]);
    }
}
