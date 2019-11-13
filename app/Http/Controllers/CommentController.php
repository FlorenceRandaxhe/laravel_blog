<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->content = $request->post_comment;
        $comment->owner_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect('/posts/' . $request->post_id);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
