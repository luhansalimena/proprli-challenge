<?php

namespace App\Actions\Buildings;

use App\Models\Building;


class CreateBuilding

{
    public static function execute(array $data): Building
    {
        return Building::create($data);
    }
}
