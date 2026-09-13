<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use App\Model\StarshipStatusEnum;

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
        StarshipStatusEnum::COMPLETED,
      ),
      new Starship(
        2,
        'X-Wing',
        'Fighter',
        'Han Solo',
        StarshipStatusEnum::WAITING,
      ),
      new Starship(
        3,
        'Tie Fighter',
        'Fighter',
        'Leia Organa',
        StarshipStatusEnum::WAITING,
      ),
      new Starship(
        4,
        'Star Destroyer',
        'Capital',
        'Darth Vader',
        StarshipStatusEnum::IN_PROGRESS,
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
