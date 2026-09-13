<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\StarshipRepository;

class StarshipController extends AbstractController
{
  #[Route('/starships/{id<\d+>}', name: 'starship_show', methods: ['GET'])]
  public function show(int $id, StarshipRepository $starshipRepository): Response
  {
    $ship =  $starshipRepository->find($id);

    if (!$ship) {
      throw $this->createNotFoundException('Starship not found');
    }

    return $this->render('starship/show.html.twig', [
      'ship' => $ship,
    ]);
  }
}
