<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function rules()
    {
        echo('Điều khoản là công nhận Tiệp đẹp trai');
    }

    public function register(){

        return view('register');
    }

    public function postRegister(Request $request)
    {
        $allrequest = $request->all();
        $validator  = $this->validator($allrequest);

        if($validator->fails())
        {
            return redirect('register')->withErrors($validator)->withInput();
        }
        else{
            if($this->create($allrequest)){
                $request->session()->flash('success','Đăng kí thành công');
                return redirect('register');
            }
            else{
                $request->session()->flash('success','Đăng kí thành công');
                return redirect('register');
            }
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6|confirmed|regex:/[@$!%*#?&]/|',
                'phone'    => 'required|string|min:10|max:10'
            ],
            [
                'phone.min'          => 'Số điện thoại không hợp lệ',
                'phone.max'          => 'Số điện thoại không hợp lệ',
                'phone.required'     => 'Điện thoại bắt buộc nhé em yêu',
                'name.required'      => 'Họ và tên là trường bắt buộc',
                'name.max'           => 'Họ và tên không quá 255 ký tự',
                'email.required'     => 'Email là trường bắt buộc',
                'email.email'        => 'Email không đúng định dạng',
                'email.max'          => 'Email không quá 255 ký tự',
                'email.unique'       => 'Email đã tồn tại',
                'password.required'  => 'Mật khẩu là trường bắt buộc',
                'password.min'       => 'Mật khẩu phải chứa ít nhất 8 ký tự',
                'password.confirmed' => 'Xác nhận mật khẩu không đúng',
                'password.regex'     =>'Mật khẩu phải có kí tự đặc biệt'
            ]
        );
    }

    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
