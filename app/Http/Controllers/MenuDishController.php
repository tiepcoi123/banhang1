<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\{Dish,Chef,Category,Value, Attribute, Variant};
class MenuDishController extends Controller
{
     public function list_menu()
    {
        $getData = Dish::latest()->paginate(10);

        $category = Category::all();

        return view('dish.list', compact('getData','category'));
    }

    public function create()
    {
        $chef = Chef::all();
        $attribute = Attribute::all();
        $category = Category::all();
        return view('dish.create', compact('chef','category','attribute'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),
        [
            'name_dish'     => 'required|unique:dish,name_dish',
            'price'         => 'required',
            'chef_id'       => 'required',
            'category_id'   => 'required',
            'value_id'      => 'required',
        ],
        [
            'name_dish.required' => 'Tên món đâu',
            'name_dish.unique'   => 'Món này có rồi bro' ,
            'price.required'     =>  'Bao tiền' ,   
            'chef_id.required'   =>  'Ai nấu thế' ,
            'category_id.required'   =>  'Phân loại' ,
            'value_id.required'   =>  'Phân Size bạn ơi' ,

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

        $value_array = [];
        foreach ($request->value_id as $value) {
            foreach ($value as $item) {
                $value_array[] = $item;
            }
        }
        $insertDish->value()->attach($value_array);

        $variants = get_Combination($request->value_id);

        foreach ($variants as $variant) {
            $var = Variant::create([
                'dish_id' => $insertDish->id
            ]);
            $var->value()->attach($variant);
        }

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
        // dd($dish->value);
        $value = Value::all();
        $variant = Variant::all();
        $attribute = Attribute::all();
        $chef = Chef::all();
        $category = Category::all();
        return view('dish.edit',compact('dish','chef','category','attribute','variant'));
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
            'value_id'      => 'required'
        ],
        [
            'name_dish.required'    => 'Tên món đâu',
            'name_dish.unique'      => 'Món này có rồi bro' ,
            'price.required'        =>  'Bao tiền' ,
            'chef_id.required'      =>  'Ai nấu thế' ,
            'category_id.required'  =>  'Phân loại' ,
            'value_id.required'     =>  'Giá trị' ,
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
        $dish->value()->sync($request->value_id);

        // $variants = get_Combination2($request->value_id);
        // foreach ($variants as $variant) {
        //     if (check_variant($dish, $variant)) {
        //         $var = Variant::create([
        //             'dish_id' => $dish->id
        //         ]);
        //         $var->value()->attach($variant);
        //     }
        // }

        // foreach ($variants as $variant) {
        //     $var = Variant::create([
        //         'dish_id' => $dish->id
        //     ]);
        //     $var->value()->attach($variant);
        // }

        Session::flash('success', 'Chỉnh sửa món thành công');

        return redirect()->route('list_dish');
    }

    public function delete($id)
    {
        $dish = Dish::find($id);
        $dish->delete();
        return response()->json([], 201);
    }

    public function variant(Dish $dish)
    {
        $dish = Dish::all();
        return view('varian_list', compact('dish'));
    }
}
