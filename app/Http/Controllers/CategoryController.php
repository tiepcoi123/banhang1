<?php

namespace App\Http\Controllers;

use App\Models\{Category};
use Session;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $getData = Category::latest()->paginate(2);
        return view('category.list', compact('getData'));
    }

    public function create()
    {
        $categoryData =Category::all();

        return view('category.create', compact('categoryData'));
    }

    public function store(Request $request )
    {
        $validator= Validator::make($request->all(),
        [
            'name' => 'required|unique:category'
        ],
        [
            'name.required' => 'Điền category vào đi bro vào đi bro',
            'name.unique'   => 'Danh mục đã tồn tại rồi bro'
        ]);

        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $categoryData = Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('list_category');
    }

    public function edit(Category $category)
    {
        $category =Category::all();

        return view('category.edit', compact(['category']));
    }

    public function update(Request $request, Category $category)
    {
        $category ->update([
            'name'  => $request->name,
        ]);

        Session::flash('success', 'Chỉnh sửa thành công' );
    }

    public function delete(Category $category)
    {
        $category->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('list_category');
    }
}
