<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Variant};

class VariantController extends Controller
{
    public function list( Variant $variant , Dish $dish)
    {
        $dish = Dish::all();
        $variant = Variant::latest()->paginate(2);
        return view('variant.list', compact('variant'));
    }

    public function create(Variant $variant)
    {
        $dish = Dish::all();
        return view('variant.create', compact('dish','variant'));
    }

    public function store(Variant $variant , Request $request)
    {
        $varidator = Varidator::make($request->all(),
            [
                'dish_id'       => 'required',
                'price'         => 'required',
                'quantity'      => 'required',
            ],
            [
                'dish_id.required'   => 'Cần có món đối chứng bro',
                'price.required'     => 'Cần giá bro ạ',
                'quantity.required'  => 'Cần số lượng bro',
            ]
        );

        if($varidator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $variant = Variant::create([
            'dish_id'   => $request->dish_id,
            'price'   => $request->price,
            'quantity'   => $request->quantity,
        ]);

        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('list.vriant');
    }

    public function edit(Variant $variant )
    {
        return view('variant.edit',compact('variant'));
    }

    public function update(Variant $variant , Request $request)
    {
        $variant->update([
            'dish_id'   => $request->dish_id,
            'price'     => $request->price,
            'quantity'  => $request->quantity,
        ]);
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('list.variant');
    }

    public function delete(Variant $variant)
    {
        $variant->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('list.variant');
    }
}
