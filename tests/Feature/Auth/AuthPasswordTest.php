<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class AuthPasswordTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function password_confirmation_page_loads_properly()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');

        $response->assertStatus(200);
        $response->assertSee('Please confirm your password');
    }

    #[Test]
    public function user_cannot_proceed_with_invalid_password_confirmation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('password');
    }

    #[Test]
    public function password_reset_request_requires_valid_email()
    {
        $response = $this->post('/forgot-password', [
            'email' => 'invalid-email',
        ]);

        $response->assertSessionHasErrors('email');
    }

    #[Test]
    public function password_reset_request_requires_existing_user_email()
    {
        $response = $this->post('/forgot-password', [
            'email' => 'nonexistent@example.com',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
