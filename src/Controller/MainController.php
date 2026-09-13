<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\StarshipRepository;

class MainController extends AbstractController
{
  #[Route('/', name: 'app_homepage', methods: ['GET'])]
  public function homepage(StarshipRepository $starshipRepository): Response
  {
    $startShipCount = count($starshipRepository->findAll());

    $myShip = $starshipRepository->find(1);
    $ships = $starshipRepository->findAll();

    return $this->render('main/homepage.html.twig', [
      'startShipCount' => $startShipCount,
      'myShip' => $myShip,
      'ships' => $ships,
    ]);
  }
}
