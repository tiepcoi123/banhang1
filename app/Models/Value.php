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

    public function varriant()
    {
        return $this->belongstoMany('App\Models\Varriant', 'varriant_value','varriant_id','value_id');
    }

    public function dish()
    {
        return $this->belongstoMany('App\Models\Dish', 'value_dish','value_id','dish_id');
    }
}
