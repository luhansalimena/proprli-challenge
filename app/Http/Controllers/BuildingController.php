<?php

namespace App\Http\Controllers;

use App\Actions\Buildings\CreateBuilding;
use App\Actions\Buildings\GetBuildings;
use App\Http\Requests\StoreBuildingRequest;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        return GetBuildings::execute();
    }
    public function store(StoreBuildingRequest $request)
    {
        return CreateBuilding::execute($request->all());
    }
}
