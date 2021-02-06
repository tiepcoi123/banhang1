<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Validator;
use Session;

class StaffController extends Controller
{
    public function list(Staff $staff)
    {
        $staff = Staff::latest()->paginate(10);
        return  view('staff.list', compact('staff'));
    }

    public function create(Staff $staff)
    {
        return view('staff.create',compact('staff'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),
            [
                'name'      => 'required',
                'birth'     => 'required',
                'start_job' => 'required',
                'phone'     => 'required',
                'email'     => 'required|unique:staff,email',
            ],
            [
                'name.required'         => 'Tên nhân viên bro',
                'birth.required'        => 'Ngày sinh nhân viên bro',
                'start_job.required'    => 'Ngày bắt dầu làm việc của nhân viên bro',
                'phone.required'        => 'SĐT nhân viên bro',
                'email.required'        => 'Email của nhân viên bro',
                'email.unique'          => 'Email của nhân viên trùng rồi bro',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $staff = Staff::create([
            'name'      => $request->name,
            'birth'     => $request->birth,
            'start_job' => $request->start_job,
            'phone'     => $request->phone,
            'email'     => $request->email,
        ]);

        Session::flash('success', 'Thêm mới nhân viên thành công');

        return redirect()->route('create_staff');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Type $var = null)
    {
        $validator = Validator::make($request->all(),
            [
                'name'      => 'required',
                'birth'      => 'required',
                'start_job' => 'required',
                'phone'     => 'required',
                'email'     => 'required|unique:staff,email ',
                
            ],

            [
                'name.required'         => 'Tên nhân viên bro',
                'birth.required'         => 'Ngày sinh nhân viên bro',
                'start_job.required'    => 'Ngày bắt dầu làm việc của nhân viên bro',
                'phone.required'        => 'SĐT nhân viên bro',
                'email.required'        => 'Email của nhân viên bro',
                'email.unique'          => 'Email của nhân viên trùng rồi bro',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        Session::flash('success', 'Chỉnh sửa nhân viên thành công');
        return redirect()->route('list_staff');
    }

    public function delete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return response()->json([], 201);
    }
}
