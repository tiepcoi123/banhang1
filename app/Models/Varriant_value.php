<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variant_value extends Model
{
    use HasFactory;

    public function variant()
    {
        return $this->belongstoMany('App\Models\variant','id','variant_id');
    }
}
