<?php

namespace App\Http\Controllers;

use App\Actions\Comments\CreateComment;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Task;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request,Task $task)
    {
        return CreateComment::execute($request->validated(),$task);
    }
}
