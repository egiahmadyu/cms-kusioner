<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_kuesioner_id',
        'question',
        'before_question',
        'is_start',
        'is_end',
        'choice'
    ];
}
