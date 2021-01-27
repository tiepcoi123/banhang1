<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimekeepController extends Controller
{
    public function timekeep()
    {
        
        return view('timekeeping.list');
    }

    public function timestart(Request $request)
    {
        return view('timekeeping.list');
    }

    public function timeout(Type $var = null)
    {
        # code...
    }
}
