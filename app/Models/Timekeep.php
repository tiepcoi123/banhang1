<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timekeep extends Model
{
    use HasFactory;
    protected $table = 'timekeep';

    protected $fillable = [
        'start',
        'out'
    ];
}
