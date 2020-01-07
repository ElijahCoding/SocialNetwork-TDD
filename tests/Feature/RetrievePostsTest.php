<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrievePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_retrieve_posts()
    {
        $this->actingAs($user = factory(User::class)->create(), 'api');

        $anotherUser = factory(User::class)->create();

        $posts = factory(Post::class, 2)->create(['user_id' => $anotherUser->id]);

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
                ->assertJson([

                ]);
    }
}
