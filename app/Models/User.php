<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class,'user_id');
    }

    public function scopeDeactiveCountUser($query)
    {
        return $query->where('status',0)->count();
    }

    public function scopeDeactiveUser($query)
    {
        return $query->where('status',0)->get();
    }

    public function services()
    {
        return $this->hasMany(Service::class,'user_id');
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.User.'.$this->id;
    }

    public function receiverMessage()
    {
        return $this->hasMany(Message::class,'receiver_id');
    }

    public function senderConversation()
    {
        return $this->hasMany(Conversation::class,'sender_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'user_id');
    }

}
