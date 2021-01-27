<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attribute';
    
    protected $fillable = [
        'id',
        'name'
    ];

    public function value()
    {
        return $this->hasMany('App\Models\Value','attribute_id','id');
    }
}
