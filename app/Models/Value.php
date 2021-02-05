<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'value';

    protected $fillable =[
        'id',
        'name',
        'attribute_id',
    ];
    
    public function dish()
    {
        return $this->belongsToMany('App\Models\Dish', 'value_dish', 'value_id', 'dish_id');
    }
    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id', 'id');
    }

    public function variant()
    {
        return $this->belongsToMany('App\Models\Variant', 'variant_value',  'variant_id','value_id');
    }
}
