<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_dish extends Model
{
    use HasFactory;

    protected $table = 'category_dish';

    protected $fillable =[
        'category_id',
        'dish_id'
    ];

    public function dish()
    {
        return $this->belongstoMany('App\Models\Dish','id','dish_id');
    }
}
