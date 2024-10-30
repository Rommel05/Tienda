<?php

namespace App\Controller;

use App\Entity\Team;
use App\Service\ProductsService;
use App\Service\TeamService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(TeamService $teamService, ProductsService $productsService): Response
    {
        $team = $teamService->getTeam();
        $products = $productsService->getProducts();
        return $this->render('page/index.html.twig', compact('team', 'products'));
    }

    #[Route('/about', name: 'about')]
    public function about(TeamService $teamService): Response
    {
        $team = $teamService->getTeam();
        return $this->render('page/about.html.twig', compact('team'));
    }


    #[Route('/service', name: 'service')]
    public function service(): Response
    {
        return $this->render('page/service.html.twig', []);
    }

    #[Route('/price', name: 'price')]
    public function price(): Response
    {
        return $this->render('page/price.html.twig', []);
    }

    #[Route('/team', name: 'team')]
    public function team(TeamService $teamService): Response
    {
        $team = $teamService->getTeam();
        return $this->render('page/team.html.twig', [
            'team' => $team,
        ]);
    }

    #[Route('/testimonial', name: 'testimonial')]
    public function testimonial(): Response
    {
        return $this->render('page/testimonial.html.twig', []);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig', []);
    }

    public function teamTemplate(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Team::class);
        $team = $repository->findAll();
        return $this->render('partials/_team.html.twig',compact('team'));
    }
}
