<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeKuesioner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'to_question'
    ];

    public function question() {
        return $this->hasMany(Question::class);
    }
}
