<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table ='category';
    
    public $timestamp = false;

    protected $fillable =[
        'name',
        'parent_id',
    ];

    public function dish()
    {
        return $this->belongstoMany('App\Models\Dish', 'category_dish','category_id','dish_id');
    }
}
