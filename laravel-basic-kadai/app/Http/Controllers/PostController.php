<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->contents = $request->input('contents');
        $post->save();

        return redirect('/posts');
    }
}
