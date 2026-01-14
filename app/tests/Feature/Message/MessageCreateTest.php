<?php

use App\Models\User;

// test('message creation requires subject and content', function () {
//     $data = [
//         'subject' => '',
//         'content' => '',
//         'send_date' => now()->addDays(2)->toDateString(),
//     ];

//     $response = $this->post(route('messages.store'), $data)
//         ->assertRedirect(route('home'));

//     $response->assertInvalid(['subject', 'content']);
// });

// test('message creation requires a send date', function () {
//     $data = [
//         'subject' => 'Test Subject',
//         'content' => 'This is a test message content.',
//         'send_date' => '',
//     ];

//     $response = $this->post(route('messages.store'), $data)
//         ->assertRedirect(route('home'));

//     $response->assertInvalid(['send_date']);
// });

test('unauthenticated user can create a message', function () {
    $data = [
        'subject' => 'Test Subject',
        'content' => 'This is a test message content.',
        'send_date' => now()->addDays(2)->toDateString(),
    ];

    $this->post(route('messages.store'), $data)
        ->assertRedirect(route('home'));

    $this->assertDatabaseHas('messages', [
        'subject' => 'Test Subject',
        'content' => 'This is a test message content.',
        'user_id' => null,
    ]);
});

// test('authenticated user can create a message', function () {
//     $user = User::factory()->create();

//     $data = [
//         'subject' => 'Test Subject',
//         'content' => 'This is a test message content.',
//         'send_date' => now()->addDays(2)->toDateString(),
//     ];

//     $this->actingAs($user)
//         ->post(route('messages.store'), $data)
//         ->assertRedirect(route('dashboard'));

//     $this->assertDatabaseHas('messages', [
//         'subject' => 'Test Subject',
//         'content' => 'This is a test message content.',
//         'user_id' => $user->id,
//     ]);
// });
