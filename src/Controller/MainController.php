<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\StarshipRepository;

class MainController extends AbstractController
{
  #[Route('/', name: 'homepage')]
  public function homepage(StarshipRepository $starshipRepository): Response
  {
    $startShipCount = count($starshipRepository->findAll());

    $ship = $starshipRepository->find(1);

    return $this->render('main/homepage.html.twig', [
      'startShipCount' => $startShipCount,
      'ship' => $ship,
    ]);
  }
}
