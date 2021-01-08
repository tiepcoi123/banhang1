<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Session;
use Auth;
class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function  postlogin(Request $request)
    {
        $rule =[
            'email' =>'required|email',
            'password' => 'required|min:6|regex:/[@$!%*#?&]/',
        ];

        $messenger =[
            'email.required'  => 'Email là trường bắt buộc',
            'email.email'     => 'Email không đúng định dạng',
            'password.required' => 'Password là trường bắt buộc',
        ];

        $validator = Validator:: make($request->all(), $rule, $messenger);

        if($validator-> fails()){
            return redirect('login')->withErrors($validator)->withInput();
        }

        else{
            $email     = $request->input('email');
            $password  = $request->input('password');

            $remembre  = false;

            if(isset($request->remember) && $request->remember != null){
                $remember = true;
            }

            if(Auth::attempt(['email' => $email, 'password' => $password])){
                
                return redirect()->route('dashboard');
            }
            else{
                Session::flash('error','Email hoặc mật khẩu không đúng !');
                return redirect('login');
            }
        }
    }

    public function logout()
    {   
        Auth::logout();
        return redirect('login');
    }
}
