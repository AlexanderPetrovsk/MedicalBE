<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{
    public function __construct(
        private ProductRepository $productRepository,
        private SerializerInterface $serializer
    )
    {
    }

    #[Route('/products', name: 'app_product')]
    public function index(): Response
    {
        $productObjects = $this->productRepository->getProducts();
        $products = [];

        foreach ($productObjects as $productObject) {
            array_push($products, json_decode($this->serializer->serialize($productObject, 'json'), true));
        }

        return $this->json($products);
    }
}
