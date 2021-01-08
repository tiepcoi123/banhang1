<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\{Dish,Chef};
class MenuDishController extends Controller
{
     public function list_menu()
    {
        $getData = Dish::latest()->paginate(2);
        return view('dish.list', compact('getData'));
    }

    public function create()
    {
        $chef = Chef::all();
        return view('dish.create', compact('chef'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),
        [
            'name_dish' => 'required',
            'price'     => 'required',
            'chef_id'   => 'required',
        ],
        [
            'name_dish.required' => 'Tên món đâu', 
            'price.required'     =>  'Bao tiền' ,   
            'chef_id.required'   =>  'Ai nấu thế' , 
        ]);

        if($validator->fails()){

        return redirect()->back()->withErrors($validator->errors())->withInput();
        
        }

        $insertDish = Dish::create([
            'name_dish' => $request->name_dish,
            'price'     => $request->price,
            'chef_id'   => $request->list_chef
        ]);


        if($insertDish){
            Session::flash('success', 'Thêm món thành công');
        }
        return redirect()->route('create_dish');

    }


    public function edit($id)
    {
        $dish = Dish::find($id);

        return view('dish.edit',compact('dish'));
    }

    public function update(Request $request, $id){
        $dish = Dish::find($id);

        $dish->update([
            'name_dish' => $request->name_dish,
            'price'     => $request->price,
        ]);

        Session::flash('success', 'Chỉnh sửa món thành công');

        return redirect()->route('list_dish');
    }
    
    public function delete(Dish $dish)
    {
        $dish->delete();
    }
}
