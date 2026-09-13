<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Model\Starship;
use App\Repository\StarshipRepository;

#[Route('/api/starships')]
class StartshipApiController extends AbstractController
{
  public function __construct(private readonly StarshipRepository $starshipRepository) {}

  #[Route('', methods: ['GET'])]
  public function getCollection(): Response
  {
    /** @var Starship[] $startships */
    $startships = $this->starshipRepository->findAll();

    return $this->json($startships);
  }

  #[Route('/{id<\d+>}', methods: ['GET'])]
  public function get(int $id): Response
  {
    $starship = $this->starshipRepository->find($id);

    if ($starship === null) {
      throw $this->createNotFoundException('Starship not found');
    }

    return $this->json($starship);
  }
}
