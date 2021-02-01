<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct(){
       $this->middleware('guest')->except('logout');
    }

    public function getLoginPage(request $request)
    {
        return view('authentication.login');
    }

    public function login(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'email' => 'required|email:rfc,dns',
          'password' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('/login')->withErrors($validator, 'login');
      }
      $email = $request->email;
      $password = $request->password;
      $remember = $request->remember;

      if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
          $request->session()->regenerate();
          return redirect('/blogs');
      }
      return redirect('/login')->with('status', 'Data Tidak User Ditemukan');
    }

    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
    }
}
