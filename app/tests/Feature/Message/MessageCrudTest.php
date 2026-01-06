<?php

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Carbon;

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
