<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Value,Attribute};
use Session;
use Validator;

class ValueController extends Controller
{
    public function list(Value $value)
    {
        $value = Value::paginate(5);
        return view('value.list', compact('value'));
    }

    public function create()
    {
        $attribute = Attribute::all();
        $value = Value::all();
        return view('value.create' ,compact('attribute','value'));
    }

    public function store(Value $value, Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required',
                'attribute_id' => 'required'
            ],
            [
                'name.required' => 'Cần phải điền giá trị',
                'attribute_id'  => 'Chưa điền thuộc tính'
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $value = Value::create([
            'name'          => $request->name,
            'attribute_id'  => $request->attribute_id,
        ]);

        Session::flash('success', 'Thêm mưới thành công');
        
        return redirect()->route('list_value');
    }

    public function edit(Value $value)
    {
        $attribute = Attribute::all();
        return view('value.edit', compact('value','attribute'));
    }

    public function update(Value $value, Request $request)
    {
        $value = Value::update([
            'name'          => $request->name,
            'attribute_id'     => $request->attribute_id
        ]);

        Session::flash('success', 'Update thành công');
        return redirect()->back()->route('list.value');
    }

    public function delete(Value $value)
    {
        $value->delete();
    }
}
