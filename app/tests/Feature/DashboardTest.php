<?php

use App\Models\Message;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/dashboard')->assertStatus(200);
});

test('dashboard separates sent, queued, and cancelled messages', function () {
    $user = User::factory()->create();

    $sentMessage = Message::factory()->create(['user_id' => $user->id, 'subject' => 'Sent', 'sent' => true]);
    $queuedMessage = Message::factory()->create(['user_id' => $user->id, 'subject' => 'Queued']);
    $cancelledMessage = Message::factory()->create(['user_id' => $user->id, 'subject' => 'Cancelled', 'cancelled' => true]);

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertViewHas('sentMessages', fn ($messages) => $messages->pluck('id')->all() === [$sentMessage->id])
        ->assertViewHas('queuedMessages', fn ($messages) => $messages->pluck('id')->all() === [$queuedMessage->id])
        ->assertViewHas('cancelledMessages', fn ($messages) => $messages->pluck('id')->all() === [$cancelledMessage->id]);
});
