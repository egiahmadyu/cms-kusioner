<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'question_id',
        'answer'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
