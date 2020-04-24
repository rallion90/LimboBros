<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct(){
    	$this->middleware('guest:admin');
    }

    public function LoginForm(){
    	return view('Admin/login');
    }

    public function Login(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required:min:8'
    	]);

    	$credentials = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];

    	if(Auth::guard('admin')->attempt($credentials)){
    		return redirect()->route('admin.index');
    	}
    }

    public function name(){
        return 'admin_name';
    }
}
