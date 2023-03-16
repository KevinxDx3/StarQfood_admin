<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        return $request;
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());


    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(null, 204);
    }

    public function show(Comment $comment)
    {

    }
}
