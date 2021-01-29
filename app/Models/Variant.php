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

    public function dish()
    {
        return $this->belongstoMany('App\Models\Dish','');
    }
    
    public function value()
    {
        return $this->belongstoMany('App\Models\Value', 'variant_value','variant_id','value_id');
    }
}
