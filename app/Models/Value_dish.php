<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value_dish extends Model
{
    use HasFactory;
    protected $table = 'value_dish';

    protected $fillable =[
        'value_id',
        'dish_id'
    ];

    public function dish()
    {
        return $this->belongstoMany('App\Models\Dish','id','dish_id');
    }
}
