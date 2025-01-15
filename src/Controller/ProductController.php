<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function index(Environment $twig, ProductRepository $productRepository): Response   {
       

        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }   

    #[Route('/product/{slug}', name: 'app_product_show')]
    public function show( string $slug, ProductRepository $productRepository): Response    
    {
        $product = $productRepository->findOneBy(['slug' => $slug]);

        return $this->render('product/show.html.twig',[
            'product' => $product,]);
    }

    
}