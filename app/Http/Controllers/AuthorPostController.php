<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;

use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    public function index(User $user)
    {
        //return $user->load('posts');
        $posts = $user->posts()->paginate(5);
        return view('posts.index', compact('user', 'posts'));
    }
}
