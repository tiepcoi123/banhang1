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
        'chef_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongstoMany('App\Models\Category', 'category_dish','dish_id','category_id');
    }

    public function value()
    {
        return $this->belongstoMany('App\Models\Value', 'value_dish','dish_id','value_id');
    }
}
