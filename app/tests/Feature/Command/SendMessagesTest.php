<?php

use App\Models\User;
use App\Models\Message;
use App\Mail\FutureMessage;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


test('command exists', function () {
    $this->artisan('futch:send')->assertExitCode(0);
});

test('command has correct basic output', function () {
    $this->artisan('futch:send')
        ->expectsOutputToContain('Checking daily messages...')
        ->expectsOutputToContain('Finished checking daily messages....')
        ->expectsOutputToContain('Total messages scheduled to be sent today:')
        ->expectsOutputToContain('Total messages sent today:');
});

test('command finds and sends no messages', function () {
    $user = User::factory()->create();

    Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Test Message',
        'content' => 'This is a test message.',
        'sent' => false,
        'send_date' => now()->addWeek()->toDateString() ,
    ]);

    $this->artisan('futch:send')
        ->expectsOutputToContain('Total messages scheduled to be sent today: 0')
        ->expectsOutputToContain('Total messages sent today: 0')
        ->assertExitCode(0);

    Mail::fake();
    Mail::assertNotSent(FutureMessage::class);
});

test('command finds messages to send', function () {
    $user = User::factory()->create();

    Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Test Message',
        'content' => 'This is a test message.',
        'sent' => false,
        'send_date' => now()->toDateString(),
    ]);

    $this->artisan('futch:send')
        ->expectsOutputToContain('Total messages scheduled to be sent today: 1')
        ->assertExitCode(0);
});

test('command finds and sends messages', function () {
    Mail::fake();

    $user = User::factory()->create();

    Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Test Message',
        'content' => 'This is a test message.',
        'sent' => false,
        'send_date' => now()->toDateString(),
    ]);

    $this->artisan('futch:send')
        ->expectsOutputToContain('Total messages scheduled to be sent today: 1')
        ->expectsOutputToContain('Total messages sent today: 1')
        ->assertExitCode(0);

    Mail::assertSent(FutureMessage::class, $user->email);
});

test('command finds and sends messages with correct content', function () {
    Mail::fake();

    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Test Message',
        'content' => 'This is a test message.',
        'sent' => false,
        'send_date' => now()->toDateString(),
    ]);

    $this->artisan('futch:send')
        ->assertExitCode(0);

    Mail::assertSent(FutureMessage::class, function ($mail) use ($message) {
        $html = $mail->render();

        $sendDate = Carbon::parse($message->send_date);

        return str_contains($html, $message->content) && str_contains($html, $sendDate->format('m/d/Y'));
    });
});

test('command sets message as sent when sent', function () {

    $user = User::factory()->create();

    $message = Message::factory()->create([
        'user_id' => $user->id,
        'subject' => 'Test Message',
        'content' => 'This is a test message.',
        'sent' => false,
        'send_date' => now()->toDateString(),
    ]);

    $this->artisan('futch:send')
        ->assertExitCode(0);

    $message->refresh();
    expect($message->sent)->toBe(1);
});
