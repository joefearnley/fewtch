<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject',
        'content',
        'send_date',
        'user_id',
    ];

    /**
     * Get the user that owns the message.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the message status.
     */
    public function getStatusAttribute()
    {
        if ($this->cancelled) {
            return __('Cancelled');
        }

        if ($this->sent) {
            return __('Sent');
        }

        return __('Pending');
    }

        /**
     * Get the message status.
     */
    public function getStatusColorAttribute()
    {
        if ($this->cancelled) {
            return 'pink';
        }

        if (!$this->sent) {
            return 'yellow';
        }

        return 'emerald';
    }
}
