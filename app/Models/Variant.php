<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = 'variant';

    protected $fillable =[
        'id',
        'dish_id',
        'price',
        'quantity',
    ];

    public function value()
    {
        return $this->belongsToMany('App\Models\Value', 'variant_value', 'value_id', 'variant_id');
    }

    public function dish()
    {
        return $this->belongsTo('App\Models\Dish', 'dish_id', 'id');
    }
}
