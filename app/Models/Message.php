<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'message',];

    protected $with = ['sender', 'receiver'];

    public function scopeBySender($q, $sender)
    {
        $q->where('sender_id', $sender);
    }

    public function scopeByReceiver($q, $receiver)
    {
        $q->where('receiver_id', $receiver);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id')
            ->select(['id', 'name']);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id')
            ->select(['id', 'name']);
    }
}
