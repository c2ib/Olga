<?php

namespace App\Controller;

use App\Entity\Ligue;
use App\Entity\Sport;
use App\Repository\LigueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $ligue = new Ligue();
        $ligue ->setName('Ligue 1')
                ->setOrigine('France');
        $sport = new Sport();
        $sport ->setName('Football');
        $em->persist($sport);

        $em->flush();

        return $this->render('home/home.html.twig', [
            'controller_name' => 'ConferenceController',
        ]);
    }
}
