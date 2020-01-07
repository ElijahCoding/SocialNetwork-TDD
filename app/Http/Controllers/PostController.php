<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

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
