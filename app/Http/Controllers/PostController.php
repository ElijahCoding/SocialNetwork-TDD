<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return new PostCollection(request()->user()->posts);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'body' => 'required'
        ]);

        $post = request()->user()->posts()->create($data);

        return new PostResource($post);
    }
}
