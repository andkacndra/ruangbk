<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'counseling_session_id',
        'sender_id',
        'message',
        'read_at',
    ];

    public function session()
    {
        return $this->belongsTo(
            CounselingSession::class,
            'counseling_session_id'
        );
    }

    public function sender()
    {
        return $this->belongsTo(
            User::class,
            'sender_id'
        );
    }
}
