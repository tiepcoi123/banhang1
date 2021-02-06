<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    public  $timestap = false;
    
    protected $fillable = [
        'name',
        'level',
        'birth',
        'start_job',
        'phone',
        'email',
    ];
}
