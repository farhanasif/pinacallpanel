<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	 //use AuthenticatesUsers;

	 protected $redirectTo = '/dashboard';

	public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
    	return view('auth.login');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        { 
           return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->withErrors($this->errors)
                ->withErrors('error','Email-Address And Password Are Wrong.');
        }
          
    }

     public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login');
    }
}
