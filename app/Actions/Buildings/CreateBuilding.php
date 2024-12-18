<?php

namespace App\Actions\Buildings;

use App\Models\Building;
use App\Repository\Interface\BuildingsRepositoryInterface;

class CreateBuilding
{
    private BuildingsRepositoryInterface $repository;

    public function __construct(BuildingsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public static function execute(array $data): Building
    {
        return app(self::class)->handle($data);
    }

    public function handle(array $data): Building
    {
        return $this->repository->create($data);
    }
}
