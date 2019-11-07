<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        /**
         * render a list of a resource
         */
        //return Auth::user();
        //$posts = Post::all();
        $posts = Post::with('author')->paginate(5);
        //return $posts;
        return view('posts.index', [
            'posts' => $posts,
             ]);
    }

    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        // Route Model Binding
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        /**
         * shows a view to create a new resource
         */
        return view('posts.create');
    }

    public function store()
    {
        /**
         * store the created resource
         */
        //return request()->all();
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->slug = Str::slug(request('title'), '-');
        auth()->user()->post()->save($post);
        //$posts->owner_id = auth()->id();

        return redirect('/');
    }

    public function edit(Post $post)
    {
        /**
         * show a view to edit an existing resource
         */
        //$this->authorize('update', $post);
        //$post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        /**
         * update the edited resource
         */
        $post->title = request('title');
        $post->content = request('content');
        $post->slug = Str::slug(request('title'), '-');
        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
