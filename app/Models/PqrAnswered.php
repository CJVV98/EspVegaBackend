<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class PqrAnswered extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'pqrs_answered';
    protected $fillable = [
        'pqr_id',
        'reply', 
    ];
}
