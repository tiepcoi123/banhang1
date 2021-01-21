<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\{Dish,Chef,Category};
class MenuDishController extends Controller
{
     public function list_menu()
    {
        $getData = Dish::latest()->paginate(2);

        $category = Category::all();

        return view('dish.list', compact('getData','category'));
    }

    public function create()
    {
        $chef = Chef::all();

        $category = Category::all();
        return view('dish.create', compact('chef','category'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),
        [
            'name_dish' => 'required|unique:dish,name_dish',
            'price'     => 'required',
            'chef_id'   => 'required',
            'category_id'   => 'required',
        ],
        [
            'name_dish.required' => 'Tên món đâu',
            'name_dish.unique'  => 'Món này có rồi bro' ,
            'price.required'     =>  'Bao tiền' ,   
            'chef_id.required'   =>  'Ai nấu thế' ,
            'category_id.required'   =>  'Phân loại' ,
            ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $insertDish = Dish::create([
            'name_dish'     => $request->name_dish,
            'price'         => $request->price,
            'chef_id'       => $request->chef_id,
        ]);

        $insertDish->category()->attach($request->category_id);

        if($insertDish){
            Session::flash('success', 'Thêm món thành công');
        }

        return redirect()->route('create_dish');
    }


    /**
     * Get view edit
     *
     * @param Dish $dish
     * @return void
     */
    public function edit(Dish $dish)
    {
        $chef = Chef::all();
        $category = Category::all();
        return view('dish.edit',compact('dish','chef','category'));
    }

    /**
     * Update món ăn
     *
     * @param Request $request
     * @param Dish $dish
     * @return void
     */
    public function update(Request $request, Dish $dish){

        $validator = \Validator::make($request->all(),
        [
            'name_dish'     => 'required',
            'price'         => 'required',
            'chef_id'       => 'required',
            'category_id'   => 'required',
        ],
        [
            'name_dish.required'    => 'Tên món đâu',
            'name_dish.unique'      => 'Món này có rồi bro' ,
            'price.required'        =>  'Bao tiền' ,
            'chef_id.required'      =>  'Ai nấu thế' ,
            'category_id.required'  =>  'Phân loại' ,
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $dish->update([
            'name_dish' => $request->name_dish,
            'price'     => $request->price,
            'chef_id'   => $request->chef_id
            ]);
            $dish->category()->sync($request->category_id);

        Session::flash('success', 'Chỉnh sửa món thành công');

        return redirect()->route('list_dish');
    }

    public function delete(Dish $dish)
    {
        $dish->delete();
        Session::flash('success','Xóa món thành công');
        return redirect()->route('list_dish');
    }
}
