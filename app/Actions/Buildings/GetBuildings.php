<?php

namespace App\Actions\Buildings;

use App\Models\Building;
use Illuminate\Database\Eloquent\Collection;


class GetBuildings

{
    public static function execute(): Collection
    {
        return Building::all();
    }
}
