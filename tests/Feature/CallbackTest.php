<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CallbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_callback_is_saved(): void
    {
        $callback = [
            'name' => 'Test client',
            'phone' => '+375 (29) 123-45-67',
            'comment' => 'Call after 18:00',
        ];

        $this->postJson(route('callback.store'), $callback)
            ->assertOk()
            ->assertExactJson(['success' => true]);

        $this->assertDatabaseHas('callbacks', $callback);
    }

    public function test_invalid_phone_returns_validation_error_without_saving_callback(): void
    {
        $this->postJson(route('callback.store'), [
            'name' => 'Test client',
            'phone' => 'invalid',
        ])->assertUnprocessable()->assertJsonValidationErrors('phone');

        $this->assertDatabaseCount('callbacks', 0);
    }

    public function test_callback_can_be_submitted_without_javascript(): void
    {
        $this->followingRedirects()->post(route('callback.store'), [
            'name' => 'Test client',
            'phone' => '+375291234567',
        ])->assertOk()->assertSee('Спасибо! Ваша заявка принята.');

        $this->assertDatabaseHas('callbacks', ['phone' => '+375291234567', 'comment' => null]);
    }

    public function test_callback_submission_is_rate_limited(): void
    {
        $callback = ['name' => 'Test client', 'phone' => '+375291234567'];

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->postJson(route('callback.store'), $callback)->assertOk();
        }

        $this->postJson(route('callback.store'), $callback)->assertTooManyRequests();

        $this->assertDatabaseCount('callbacks', 5);
    }
}
