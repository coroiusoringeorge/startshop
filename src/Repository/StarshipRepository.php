<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StarshipRepository
{
  public function __construct(private readonly LoggerInterface $logger) {}

  public function findAll(): array
  {
    $startships = [
      new Starship(
        1,
        'Millennium Falcon',
        'Garden',
        'Luke Skywalker',
        'available',
      ),
      new Starship(
        2,
        'X-Wing',
        'Fighter',
        'Han Solo',
        'available',
      ),
      new Starship(
        3,
        'Tie Fighter',
        'Fighter',
        'Leia Organa',
        'send to hq for repair',
      ),
      new Starship(
        4,
        'Star Destroyer',
        'Capital',
        'Darth Vader',
        'repaired',
      ),
    ];

    $this->logger->info('Starships fetched', ['startships' => $startships]);

    return $startships;
  }

  public function find(int $id): ?Starship
  {
    foreach ($this->findAll() as $starship) {
      if ($starship->getId() === $id) {
        return $starship;
      }
    }

    return null;
  }
}
