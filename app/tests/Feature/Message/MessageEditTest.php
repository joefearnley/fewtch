<?php

use App\Models\User;
use App\Models\Message;

test('authenticated user can view the edit form for their message', function () {
    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Original Subject',
        'content' => 'Original content',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->actingAs($user)
        ->get(route('messages.edit', $message))
        ->assertStatus(200)
        ->assertSee('Original Subject');
});

test('authenticated user cannot view the edit form for another user\'s message', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $otherUser->id,
        'subject' => 'Original Subject',
        'content' => 'Original content',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->actingAs($user)
        ->get(route('messages.edit', $message))
        ->assertStatus(403);
});

test('user must be authenticated to edit a message', function () {
    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Original Subject',
        'content' => 'Original content',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->get(route('messages.edit', $message))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});
