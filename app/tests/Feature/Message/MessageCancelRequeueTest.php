<?php

use App\Models\User;
use App\Models\Message;

test('authenticated user can requeue their message', function () {
    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'To be requeued',
        'content' => 'Requeue me',
        'send_date' => now()->addDays(3)->toDateString(),
        'cancelled' => true,
    ]);

    $this->actingAs($user)
        ->post(route('messages.requeue', $message))
        ->assertRedirect(route('dashboard'));

    $this->assertDatabaseHas('messages', [
        'id' => $message->id,
        'cancelled' => false,
    ]);
});

test('authenticated user cannot requeue another user\'s message', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $otherUser->id,
        'subject' => 'To be requeued',
        'content' => 'Requeue me',
        'send_date' => now()->addDays(3)->toDateString(),
        'cancelled' => true,
    ]);

    $this->actingAs($user)
        ->post(route('messages.requeue', $message))
        ->assertStatus(403);
});


test('authenticated user can cancel their message', function () {
    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'To be cancelled',
        'content' => 'Cancel me',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->actingAs($user)
        ->post(route('messages.cancel', $message))
        ->assertRedirect(route('dashboard'));

    $this->assertDatabaseHas('messages', [
        'id' => $message->id,
        'cancelled' => true,
    ]);
});

test('authenticated user cannot cancel another user\'s message', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $otherUser->id,
        'subject' => 'To be cancelled',
        'content' => 'Cancel me',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->actingAs($user)
        ->post(route('messages.cancel', $message))
        ->assertStatus(403);
});
