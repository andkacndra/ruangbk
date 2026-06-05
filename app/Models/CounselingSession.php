<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ChatMessage;

class CounselingSession extends Model
{
    protected $fillable = [
        'student_id',
        'teacher_id',
        'session_date',
        'session_time',
        'session_type',
        'status',
        'student_note',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
