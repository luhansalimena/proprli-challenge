<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request,Task $task)
    {
        $task->comments()->create($request->validated());
        return $task->load('comments');
    }
}
