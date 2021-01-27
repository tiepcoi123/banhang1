<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use Validator;

class AttributeController extends Controller
{
    public function list(Attribute $attribute)
    {
        $attribute = Attribute::latest()->paginate(2);

        return view('attribute.list', compact('attribute'));
    }

    public function create()
    {
        return view('attribute.create');
    }

    public function store(Attribute $attribute, Request $request)
    {
         $validator = Validator::make($request->all(),[
            'name' => 'required',
         ],
         [
             'name.required' => 'Không có tên thì biết đâu mà dùng'
         ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $attribute = Attribute::create([
            'name' => $request->name
        ]);

        return redirect()->route('list_attribute');
    }

    public function edit(Attribute $attribute)
    {
        return view('attribute.edit', compact('attribute'));
    }

    public function update(Attribute $attribute, Request $request)
    {
        $attribute ->update([
            'name'=> $request->name
        ]);

        session()->flash('success', 'update thành công');
        return redirect()-> route('list.attribute');
    }

    public function delete(Attribute $attribute)
    {
        $attribute ->delete();
        Session::flash('success','Xóa thành công');
        return redirect()-> route('list.attribute');
    }
}
