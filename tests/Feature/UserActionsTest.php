<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test; 

class UserActionsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_delete_account_with_correct_password()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('profile.destroy'), [
            'password' => 'correctpassword', 
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/goodbye'); 
    }

    #[Test]
    public function user_can_update_password()
    {
       
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('password.update'), [
            'current_password' => 'currentpassword',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    #[Test]
    public function user_can_update_profile_information()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Simulate profile update
        $response = $this->post(route('profile.update'), [
            'name' => 'New Name',
            'email' => 'new-email@example.com',
        ]);

        // Assert that the profile is updated correctly
        $response->assertSessionHasNoErrors();
        $this->assertEquals('New Name', $user->fresh()->name);
        $this->assertEquals('new-email@example.com', $user->fresh()->email);
    }

    #[Test]
    public function user_can_access_edit_profile_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Accessing the edit profile page
        $response = $this->get(route('profile.edit', $user));

        // Assert that the page is accessible
        $response->assertStatus(200);
        $response->assertSee('Edit Profile');
    }

    #[Test]
    public function user_can_view_profile_and_posts()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('profile.show', $user));

        $response->assertStatus(200);
        $response->assertSee($user->name); 
        $response->assertSee('Posts'); 
    }
}
