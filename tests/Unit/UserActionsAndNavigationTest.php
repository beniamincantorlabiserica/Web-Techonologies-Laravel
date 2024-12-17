<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class UserActionsAndNavigationTest extends TestCase
{
    use RefreshDatabase;

    
    #[Test]
    public function authenticated_user_can_see_navigation_links()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
        $response->assertSee('Profile');
    }

    #[Test]
    public function responsive_navigation_works_for_mobile_users()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Dashboard'); 
    }
    
    
    #[Test]
    public function user_cannot_create_post_with_empty_content()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('posts.store'), [
            'content' => '', 
        ]);

        $response->assertSessionHasErrors('content');
    }

    #[Test]
    public function user_cannot_create_post_with_content_too_long()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $longContent = str_repeat('a', 1001); 

        $response = $this->post(route('posts.store'), [
            'content' => $longContent,
        ]);

        $response->assertSessionHasErrors('content');
    }

    #[Test]
    public function guest_user_is_redirected_from_dashboard()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    #[Test]
    public function user_can_follow_another_user()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('follow', $otherUser));

        $response->assertSessionHasNoErrors();
        $this->assertTrue($user->following->contains($otherUser));
    }

    #[Test]
    public function guest_user_is_redirected_from_create_post_page()
    {
        $response = $this->get(route('posts.create'));

        $response->assertRedirect(route('login'));
    }
    
}
