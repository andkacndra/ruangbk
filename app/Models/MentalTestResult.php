<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentalTestResult extends Model
{
    protected $fillable = [
        'user_id',
        'academic_score',
        'anxiety_score',
        'social_score',
    ];
}
