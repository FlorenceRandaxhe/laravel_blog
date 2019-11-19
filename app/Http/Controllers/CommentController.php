<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {

        $comment = new Comment;
        $comment->content = \request('post_comment');
        $comment->owner_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect('/posts');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
