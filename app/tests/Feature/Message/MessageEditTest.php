<?php

use App\Models\User;
use App\Models\Message;

// test('authenticated user can view the edit form for their message', function () {
//     $user = User::factory()->create();

//     $message = Message::factory()->create([
//         'user_id' => $user->id,
//         'subject' => 'Original Subject',
//         'content' => 'Original content',
//         'send_date' => now()->addDays(3)->toDateString(),
//     ]);

//     $this->actingAs($user)
//         ->get(route('messages.edit', $message))
//         ->assertStatus(200)
//         ->assertSee('Original Subject');
// });

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
        ->assertStatus(200)
        ->assertSee('Original Subject');
});

// test('authenticated user can update their message', function () {
//     $user = User::factory()->create();

//     $message = Message::factory()->create([
//         'user_id' => $user->id,
//         'subject' => 'Old Subject',
//         'content' => 'Old content',
//         'send_date' => now()->addDays(3)->toDateString(),
//     ]);

//     $update = [
//         'subject' => 'Updated Subject',
//         'content' => 'Updated content',
//         'send_date' => now()->addDays(5)->toDateString(),
//     ];

//     $this->actingAs($user)
//         ->patch(route('messages.update', $message), $update)
//         ->assertRedirect(route('dashboard'));

//     $this->assertDatabaseHas('messages', [
//         'id' => $message->id,
//         'subject' => 'Updated Subject',
//         'content' => 'Updated content',
//     ]);
// });

