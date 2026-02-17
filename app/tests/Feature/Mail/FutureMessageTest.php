<?php

use App\Models\User;
use App\Models\Message;
use App\Mail\FutureMessage;


test('asserts the content of a FutureMessage is correct', function () {
    $user = User::factory()->create();

    $message = Message::factory()->create([
        'subject' => 'Test Subject',
        'content' => 'This is a test message content.',
        'created_at' => now(),
        'user_id' => $user->id,
    ]);

    $futureMessage = new FutureMessage($message);

    $futureMessage->assertFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    $futureMessage->assertSeeInHtml($message->content);
    $futureMessage->assertSeeInHtml($message->created_at->format('m/d/Y'));
});
