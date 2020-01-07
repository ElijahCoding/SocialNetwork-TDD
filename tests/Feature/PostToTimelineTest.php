<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostToTimelineTest extends TestCase
{
    use RefreshDatabase;

   protected function setUp(): void
   {
       parent::setUp();
   }

   /** @test */
   public function a_user_can_post_a_text_post()
   {
       
   }
}
