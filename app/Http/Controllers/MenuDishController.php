<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuDishController extends Controller
{
     public function list_menu()
    {
        return view('dish.list');
    }
    public function create()
    {
        return view('dish.create');
    }

    public function edit()
    {
        
    }
    
    public function delete()
    {

    }
}
