<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
     
    protected $table = 'promotion';

    protected $fillable = [
        'name',
        'type',
        'code',
        'start_date',
        'end_date',
        'count_apply',
        'discount',
    ];
}
