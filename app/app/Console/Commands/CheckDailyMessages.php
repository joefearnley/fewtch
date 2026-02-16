<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Mail\FutureMessage;


class CheckDailyMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-daily-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get today's date
        $today = now()->toDateString();

        // get message that the send_at date is today
        $messages = Message::whereDate('send_at', $today)->get();

        foreach ($messages as $message) {
            $this->info("Message ID {$message->id} is scheduled to be sent today.");
            $this->info("Sending Message ID {$message->id}....");

            Mail::to($message->user->email)
                ->send(new FutureMessage($message));
        }
    }
}
