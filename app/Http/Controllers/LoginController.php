<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('auth/login');
    }


    public function loginSubmit(Request $request){
      $validateData = $request->validate([
      'email'=>'required|email:rfc',
      'password'=>'required|min:8|max:24'
      ]);
      $email = $validateData['email'];
      $password = $validateData['password'];
      return $request->all();
    }


}
