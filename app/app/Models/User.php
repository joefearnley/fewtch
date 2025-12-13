<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Models\Message;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    /**
     * Get the messages for the user.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the sent messages for the user.
     */
    public function sentMessages()
    {
        return $this->hasMany(Message::class)
            ->where('sent', true)
            ->orderBy('created_at', 'desc');
    }

    /**
     * Get the cancelled messages for the user.
     */
    public function cancelledMessages()
    {
        return $this->hasMany(Message::class)
            ->where('cancelled', true)
            ->orderBy('created_at', 'desc');
    }

    /**
     * Get the queued messages for the user.
     */
    public function queuedMessages()
    {
        return $this->hasMany(Message::class)
            ->where('sent', false)
            ->where('cancelled', false)
            ->orderBy('created_at', 'desc');
    }
}
