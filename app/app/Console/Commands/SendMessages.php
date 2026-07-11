<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Mail\FutureMessage;


class SendMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'futch:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check to see what messages are scheduled to be sent today...and send them.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('-----------------------------------');
        $this->info('Checking daily messages...');
        $this->info('-----------------------------------');
        $this->info('');

        $today = now()->toDateString();

        $messages = Message::whereDate('send_date', $today)->get();

        $totatlMessages = $messages->count();
        $numberOfMessagesSent = 0;

        foreach ($messages as $message) {
            $this->info("Message ID {$message->id} is scheduled to be sent today.");
            $this->info("Sending Message ID {$message->id} to {$message->user->email}...");

            Mail::to($message->user->email)
                ->send(new FutureMessage($message));

            $this->info("Message ID {$message->id} has been sent.");

            $message->sent = true;
            $message->save();

            $numberOfMessagesSent++;
        }

        $this->info('-----------------------------------');
        $this->info('Finished checking daily messages....');
        $this->info('-----------------------------------');
        $this->info('');

        $this->info('------------------------------------------------');
        $this->info("Total messages scheduled to be sent today: {$totatlMessages}");
        $this->info("Total messages sent today: {$numberOfMessagesSent}");
        $this->info('------------------------------------------------');
    }
}
