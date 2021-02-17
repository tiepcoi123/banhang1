<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provided extends Model
{
    use HasFactory;

    public $table = 'provided';
    
    public  $timestap = false;

    protected $fillable = [
        'name',
        'amount',
        'time_start',
        'time_end',
        'price',
        'image',
        'note',
        'category_id',

    ];

}
