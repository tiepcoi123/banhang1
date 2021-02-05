<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant_value extends Model
{
    use HasFactory;

    protected $table = 'variant_value';

    public function value()
    {
        return $this->belongstoMany('App\Models\Value','id','dish_id');
    }
}
