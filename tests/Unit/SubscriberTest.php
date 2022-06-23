<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function add_subscriber_to_user_table()
    {
        $this->withoutExceptionalHandling();
        
        $response = $this->post('/subscribe', [
            'name' => 'subscriber',
            'email' => 'moncapada@gmail.com',
            'password' => '12345678',
            'role_id' => '2',
        ]);

        $response->assertOk();
        $this->assertCount(1, User::all());
    }

    public function an_email_is_required()
    {
        $response = $this->post('/subscribe', [
            'name' => 'subscriber',
            'email' => '',
            'password' => '12345678',
            'role_id' => '2',
        ]);

        
        $this->assertSessionaHasErrors('email');
    }
}
