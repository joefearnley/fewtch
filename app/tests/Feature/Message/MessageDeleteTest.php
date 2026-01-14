<?php

use App\Models\User;
use App\Models\Message;

test('authenticated user can delete their message', function () {
    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'To be deleted',
        'content' => 'Delete me',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->actingAs($user)
        ->delete(route('messages.destroy', $message))
        ->assertRedirect(route('dashboard'));

    $this->assertDatabaseMissing('messages', [
        'id' => $message->id,
    ]);
});

test('authenticated user cannot delete another user\'s message', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $otherUser->id,
        'subject' => 'To be deleted',
        'content' => 'Delete me',
        'send_date' => now()->addDays(3)->toDateString(),
    ]);

    $this->actingAs($user)
        ->delete(route('messages.destroy', $message))
        ->assertStatus(403);
});
