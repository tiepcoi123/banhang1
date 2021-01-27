<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;
use Session;

class ChefController extends Controller
{
    public function create()
    {

        return view('chef.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), 
            [
                'name'    => 'required',
                'birth'   => 'required',  
                'phone'   => 'required', 
            ],
            [
                'name.required' => 'Tên đầu bếp đâu',
                'birth.required' => 'Ngày sinh tháng đẻ đâu',
                'phone.required' => 'Liên lạc bằng niềm tin à',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $chefData = Chef::create([
            'name'      => $request->name,
            'birth'     => $request->birth,
            'phone'     => $request->phone,
        ]);
        
        if($chefData){
            Session::flash('success', 'thêm mới thành công');
        }

        return redirect()->route('list_chef');
    }

    public function list()
    {
        $data = Chef::paginate(3);
        return view('chef.list', compact('data'));
    }

    public function delete($id)
    {
        $chef = Chef::find($id);
        $chef->delete();
        return response()->json([], 204);
    }

    public function edit(Chef $chef)
    {
        return view('chef.edit',compact('chef'));
    }

    public function update(Request $request, Chef $chef)
    {
        $chef->update([
            'name' => $request->name,
            'birth'=> $request->birth,
            'phone'=> $request->phone,
        ]);

        Session::flash('success', 'Chỉnh sửa thành công');

        return redirect()->route('list_chef');
    }
}
