<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use Validator;
use Session;

class AttributeController extends Controller
{
    public function list(Attribute $attribute)
    {
        $attribute = Attribute::latest()->paginate(5);

        return view('attribute.list', compact('attribute'));
    }

    public function create()
    {
        return view('attribute.create');
    }

    public function store(Attribute $attribute, Request $request)
    {
         $validator = Validator::make($request->all(),[
            'name' => 'required|unique:attribute,name',
         ],
         [
            'name.required' => 'Không có tên thì biết đâu mà dùng',
            'name.unique'   => 'Trùng tên rồi bro'
         ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $attribute = Attribute::create([
            'name' => $request->name
        ]);
        Session::flash('success', 'Thêm mới thành công');
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

        Session::flash('success', 'update thành công');
        return redirect()-> route('list.attribute');
    }

    public function delete($id)
    {
        $attribute = Attribute::find($id);
        $attribute ->delete();
        return response()->json([], 204);
    }
}
