<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\{Variant,Dish,Value};

class VariantController extends Controller
{
    public function list(Dish $dish)
    {
        $variant = Variant::all();
        return view('variant.list', compact('dish','variant'));
    }

    // public function create(Variant $variant)
    // {
    //     $dish = Dish::all();
    //     return view('variant.create', compact('dish','variant'));
    // }

    // public function store(Variant $variant , Request $request)
    // {
    //     $varidator = Varidator::make($request->all(),
    //         [
    //             'dish_id'       => 'required',
    //             'price'         => 'required',
    //             'quantity'      => 'required',
    //         ],
    //         [
    //             'dish_id.required'   => 'Cần có món đối chứng bro',
    //             'price.required'     => 'Cần giá bro ạ',
    //             'quantity.required'  => 'Cần số lượng bro',
    //         ]
    //     );

    //     if($varidator->fails()){
    //         return redirect()->back()->withErrors($validator->errors())->withInput();
    //     }

    //     $variant = Variant::create([
    //         'dish_id'   => $request->dish_id,
    //         'price'   => $request->price,
    //         'quantity'   => $request->quantity,
    //     ]);

    //     Session::flash('success', 'Tạo mới thành công');
    //     return redirect()->route('list.vriant');
    // }

    public function edit(Variant $variant )
    {
        $dish = Dish::all();
        $value = Value::all();
        return view('variant.edit',compact('variant','dish','value'));
    }

    public function update(Variant $variant , Request $request)
    {
        $variant->update([
            'price'     => $request->price,
            'quantity'  => $request->quantity,
        ]);
        
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('list_dish');
    }

    public function delete(Variant $variant)
    {
        $variant->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('list.variant');
    }
}
