<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value_dish extends Model
{
    use HasFactory;


    public function value()
    {
        return $this->belongstoMany('App\Models\Value','id','value_id');
    }
}
