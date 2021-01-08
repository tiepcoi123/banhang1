<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $table = 'dish';

    public $timestamp = false;

    protected $fillable =[
        'name_dish',
        'price',
        'chef_id'
    ];
}
