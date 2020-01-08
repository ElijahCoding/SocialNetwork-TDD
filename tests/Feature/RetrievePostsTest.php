<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrievePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_retrieve_posts()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = factory(User::class)->create(), 'api');

        $anotherUser = factory(User::class)->create();

        $posts = factory(Post::class, 2)->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        [
                            'data' => [
                                'type' => 'posts',
                                'post_id' => $posts->first()->id,
                                'attributes' => [
                                    'body' => $posts->first()->body,
                                ]
                            ]
                        ],
                        [
                            'data' => [
                                'type' => 'posts',
                                'post_id' => $posts->last()->id,
                                'attributes' => [
                                    'body' => $posts->last()->body,
                                ]
                            ]
                        ]
                    ],
                    'links' => [
                        'self' => url('/posts'),
                    ]
                ]);
    }
}