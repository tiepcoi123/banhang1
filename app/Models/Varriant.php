<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varriant extends Model
{
    use HasFactory;

    protected $table = 'varriant';

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
        return $this->belongstoMany('App\Models\Value', 'varriant_value','varriant_id','value_id');
    }
}
