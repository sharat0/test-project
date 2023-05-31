<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]

    public function listProducts(EntityManagerInterface $entityManager): Response
    {
        $productRepository = $entityManager->getRepository(Product::class);
        $products = $productRepository->findAll();

        // Do something with the retrieved products
        // For example, pass them to a template for rendering

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }
}
