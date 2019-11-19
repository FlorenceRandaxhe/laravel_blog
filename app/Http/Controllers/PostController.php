<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
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
        $posts = Post::with('author')
            ->orderByDesc('published_at')
            ->paginate(5);
        //return $posts;
        return view('posts.index', [
            'posts' => $posts,
             ]);
    }

    public function show(Post $post)
    {
        $post->load('author');
        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }

    public function create()
    {
        /**
         * shows a view to create a new resource
         */
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        /**
         * store the created resource
         */
        //$validatedData = $request->validated();
        //return $validated;
        $post = new Post();
        $post->slug = Str::slug(\request('title'), '-');
        $post->title = \request('title');
        $post->content = \request('content');
        $published_at =  \request('published_at_date') ?? now()->format('Y-m-d')
            .' '
            . ($validatedData['published_at_time'] ?? \request('published_at_date') != null ? '00:00' : now()->format('H:i'))
        .':00';
        $post->published_at = $published_at;
        //return $post;
        auth()->user()->posts()->save($post);
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

    public function update(PostStoreRequest $post)
    {
        /**
         * update the edited resource
         */
        $post->slug = Str::slug(\request('title'), '-');
        $post->title = \request('title');
        $post->content = \request('content');
        $published_at =  \request('published_at_date') ?? now()->format('Y-m-d')
            .' '
            . ($validatedData['published_at_time'] ?? \request('published_at_date') != null ? '00:00' : now()->format('H:i'))
            .':00';
        $post->published_at = $published_at;
        $post->save();

        return redirect('/posts/' . $post->slug);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
