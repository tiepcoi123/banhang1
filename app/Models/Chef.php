<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;

    protected $table = 'chef';

    public  $timestap = false;

    protected $fillable = [
        'name',
        'birth',
        'phone',
    ];
    
    public function Dish()
    {
        return $this->belongstoMany('App\Models\Dish','chef_id','id');
    }
}
