<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerLoginController extends Controller
{
    //
	use AuthenticatesUsers;

	public function __construct(){
		$this->middleware('guest:customer');
	}

    public function LoginForm(){
    	return view('Customer/login');
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

    	if(Auth::guard('customer')->attempt($credentials)){
    		return redirect()->route('customer.index');
    	}else{
    		return Auth::guard('customer')->check();
    	}
    }

    public function name(){
    	return 'customer_fname';
    }
}
