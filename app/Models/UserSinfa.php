<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSinfa extends Model
{
    use HasFactory;
    protected $table = 'users_sinfa';
    protected $fillable = [
        'id',
        'names',
        'address',
        'cod_id'
    ];
}
