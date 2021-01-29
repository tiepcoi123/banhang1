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
        // $getData = Category::latest()->paginate(5);
        $getData = Category::all();
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
            'name' => $request->name,
            'parent_id' => $request->parent_id,
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

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
       return response()->json([], 204);
    }
}
