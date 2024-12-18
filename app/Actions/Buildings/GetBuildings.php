<?php

namespace App\Actions\Buildings;

use App\Repository\Interface\BuildingsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetBuildings
{
    private BuildingsRepositoryInterface $repository;

    public function __construct(BuildingsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public static function execute(): Collection
    {
        return app(self::class)->handle();
    }

    public function handle(): Collection
    {
        return $this->repository->getAll();
    }
}
