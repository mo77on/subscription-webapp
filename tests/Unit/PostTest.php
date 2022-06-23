<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function a_post_can_be_added_by_admin()
    {
        $this->withoutExceptionalHandling();
        
        $response = $this->post('/addpost', [
            'user_id' => '1',
            'title' => 'some title',
            'description' => 'some description',
        ]);

        $response->assertOk();
        $this->assertCount(1, Post::all());
    }
}
