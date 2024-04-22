<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bot;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Show extends Controller
{
    public function Register()
    {
        return view('Register');
    }
    public function Login()
    {
        return view('Login');
    }
    public function Dashboard()
    {
        return view('Dashboard');
    }
    public function Forgot()
    {
        return view('Forgot');
    }
    public function checkOtp()
    {
        return view('checkOtp');
    }
    public function Edit(Request $request)
    {
       $email =  $request->session()->get('email', 'default');
       $user = Bot::where('email' , $email)->first();

        return view('Edit' , ['user' => $user]);
    }
}
