<?php

namespace App\Http\Controllers;

use App\Models\{Provided,Category};
use Validator,Session;

use Illuminate\Http\Request;

class ProvidedController extends Controller
{
    public function list(Provided $provided)
    {
        $category = Category::all();
        $provided = Provided::latest()->paginate(10);
        return view('provided.list', compact('provided','category'));
    }

    public function create(Provided $provided)
    {
        $category = Category::all();
        return view('provided.create',compact('provided','category'));
    }

    public function store(Request $request , Provided $provided)
    {
        $validator = Validator::make($request->all(),
            [
                'name'              => 'required',
                'amount'              => 'required',
                'time_start'        => 'required',
                'time_end'          => 'required',
                'price'             => 'required',
                'category_id'          => 'required',
            ],
            [
                'name.required'         => 'Cần tên nhà cung ứng',
                'amount.required'         => 'Cần số lượng sản phẩm cung ứng',
                'time_start.required'   => 'Thời gian bắt đầu nhập hàng đâu',
                'time_end.required'     => 'Thời gian hết hạn sử dụng',
                'price.required'        => 'Tiền nhập hàng bro',
                'category_id.required'     => 'Hàng nhập là cái nào bro',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $provided = Provided::create([
            'name'              => $request->name,
            'amount'            => $request->amount,
            'time_start'        => $request->time_start,
            'time_end'          => $request->time_end,
            'price'             => $request->price,
            'note'              => $request->note,
            'image'             => $request->image,
            'category_id'       => $request->category_id,
        ]);

        return redirect()->route('list_provided');
    }

    public function edit(Provided $provided)
    {
        $category = Category::all();
        return view('provided.edit',compact('provided','category'));
    }

    public function update(Request $request, Provided $provided)
    {
        $validator = Validator::make($request->all(),
            [
                'name'          => 'required',
                'amount'        => 'required',
                'time_start'    => 'required',
                'time_end'      => 'required',
                'price'         => 'required',
            ],
            [
                'name.required'         => 'Cần tên nhà cung ứng',
                'amount.required'       => 'Cần số lượng sản cung ứng',
                'time_start.required'   => 'Thời gian bắt đầu nhập hàng đâu',
                'time_end.required'     => 'Thời gian hết hạn sử dụng',
                'price.required'        => 'Tiền nhập hàng bro',
                'category_id.required'  => 'Hàng nhập là cái nào bro',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $provided->update([
            'name'              => $request->name,
            'amount'            => $request->amount,
            'time_start'        => $request->time_start,
            'time_end'          => $request->time_end,
            'price'             => $request->price,
            'note'              => $request->note,
            'image'             => $request->image,
            'category_id'       => $request->category_id,

        ]);

        Session::flash('success', 'Update thành công');
        return redirect()->route('list_provided');
    }

    public function delete($id)
    {
        $provided = Provided::find($id);
        $provided->delete();
        return response()->json([], 201);
    }
}
