<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varriant_value extends Model
{
    use HasFactory;

    public function varriant()
    {
        return $this->belongstoMany('App\Models\Varriant','id','varriant_id');
    }
}
