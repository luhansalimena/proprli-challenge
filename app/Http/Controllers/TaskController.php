<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\CreateTask;
use App\Actions\Tasks\GetTasksFiltered;
use App\Http\Requests\IndexTasksRequest;
use App\Http\Requests\StoreTaskRequest;
use Request;

class TaskController extends Controller
{
    public function index(IndexTasksRequest $request)
    {
        return GetTasksFiltered::execute($request->validated(),['comments']);
    }

    public function store(StoreTaskRequest $request)
    {
        return CreateTask::execute($request->validated());
    }
}
