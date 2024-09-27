<?php

namespace App\Controller;

use App\Repository\NewsArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class NewsController extends AbstractController
{
    public function __construct(
        private NewsArticleRepository $newsRepository,
        private SerializerInterface $serializer
    )
    {
    }

    #[Route('/news', name: 'app_news')]
    public function index(): Response
    {
        $newsObjects = $this->newsRepository->getNews();
        $news = [];

        foreach ($newsObjects as $newsObject) {
            array_push($news, json_decode($this->serializer->serialize($newsObject, 'json'), true));
        }

        return $this->json($news);
    }
}
