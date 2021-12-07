<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    
/**
 * @Route("/category", name="category_")
 */

Class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @return Response A response instance
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()
        ->getRepository(category::class)
        ->findAll();

        return $this->render(
            'Category/index.html.twig',
            ['categories' => $categories]
            );
    }

        /**
     * @Route("/{categoryName}", name = "show")
     * @return Response A response instance
     */
    public function show(string $categoryName, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);
        if (!$category) {
            throw $this->createNoFoundException('No category with name : '.$categoryName.' found');
        }
        return $this->render(
            'Category/show.html.twig',
            ['category' => $category]
            );
    }
}