<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        if (! Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_registration_screen_cannot_be_rendered_if_support_is_disabled()
    {
        if (Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_new_users_can_register()
    {
        if (! Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        // Simulate a registration request
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '1234567890',
            'address' => '123 Test Street',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? '1' : null, // Accept terms if enabled
        ]);

        // Assert that the user is authenticated
        $this->assertAuthenticated();

        // Assert that the response redirects to the home page
        $response->assertRedirect(RouteServiceProvider::HOME);

        // Assert that the user is stored in the database
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Test User',
            'phone' => '1234567890',
            'address' => '123 Test Street',
        ]);
    }

    public function test_new_users_cannot_register_with_invalid_password()
    {
        if (! Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        // Simulate a registration request with an invalid password
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'wrong-password', // Mismatch password
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? '1' : null,
        ]);

        // Assert that the user is not authenticated
        $this->assertGuest();

        // Assert that the response contains validation errors
        $response->assertSessionHasErrors('password');
    }
}
