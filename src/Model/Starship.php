<?php

namespace App\Model;

use App\Model\StarshipStatusEnum;

class Starship
{
    public function __construct(
        public int $id,
        public string $name,
        public string $class,
        public string $captain,
        public StarshipStatusEnum $status,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function getCaptain(): string
    {
        return $this->captain;
    }

    public function getStatus(): StarshipStatusEnum
    {
        return $this->status;
    }

    public function getStatusString(): string
    {
        return $this->status->value;
    }
}
