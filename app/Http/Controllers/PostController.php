<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->validate([
            'body' => 'required'
        ]);

        $post = request()->user()->posts()->create($data);

        return response([
            'data' => [
                'type' => 'posts',
                'post_id' => $post->id,
                'attributes' => [
                    'body' => $post->body
                ]
            ],
            'links' => [
                'self' => url('/posts/' . $post->id)
            ]
        ], 201);
    }
}
