<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/categorynew", name="category_create")
     */

    public function createCategory()
    {
        $category = new Category();
        $category->setName('carnivore');

        $dessert = new Menu();
        $dessert->setName('menu4');
        $dessert->setIngrediants('kebab');
        $dessert->setPrix('8');


        $cereal = new Category();
        $cereal->addMenu($dessert);
        $cereal->setName('tacos');


        $manager = $this->getDoctrine()->getManager();
        $manager->persist($dessert);
        $manager->persist($cereal);
        $manager->flush();

        return $this->redirectToRoute('home');


    }
}
