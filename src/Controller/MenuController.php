<?php

namespace App\Controller;

use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function index(): Response
    {
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }
    /**
     * @Route("/menunew", name="menu_create")
     */

    public function createMenu(){
        $menu = new Menu();
        $menu->setIngrediants('viande');
        $menu->setName('menu1');
        $menu->setPrix('10');

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($menu);
        $manager->flush();

        dd($menu );
    }

}
