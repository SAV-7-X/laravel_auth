<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bot;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;


class Home extends Controller
{
    public function register(Request $request)
    {
        $user = new Bot;
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255',
        //     'password' => 'required|string|confirmed|max:255',
        // ]);
        // if($validator->fails())
        // {
        //     return response()->json('Validation error', 422);
        // }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

  
      $user->name = $request->name;     
      $user->email = $request->email;     
      $user->password = bcrypt($request->password);    
      $user->save(); 
      if($user->save())
      {
        $request->session()->put('name', $user->name);
        $request->session()->put('email', $user->email);
        return redirect('/dashboard');
        //  return response()->json('Successfully Inserted', 200);
        
      }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = Bot::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            // Pass the error message with a custom name to the view
            return redirect()->back()->withErrors(['custom_error' => 'Invalid email or password.']);
        }
        
        
        // Authentication successful
        $request->session()->put('name', $user->name);
        $request->session()->put('email', $user->email);
        return redirect('/dashboard');
        
    }
    public function edit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'confirmed',
        ]);
        $email = $request->session()->get('email', 'default');
        $user = Bot::where('email', $email)->first();
        // $oldPassword = $user->password;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password !== '') {
            $user->password = bcrypt($request->password);
        // //     echo $user->password;
        // // echo "and";
        // // echo $request->password;
        }
        else {
            $user->password = $user->password;
        }
        
        $user->save();
        if ($user->save()) {
            $request->session()->put('email', $user->email);
            $request->session()->put('name', $user->name);
        }
        return view('dashboard');
       
    }
   
public function forgotPassword(Request $request)
{
    // Validate the email address
    $request->validate([
        'email' => 'required|email',
    ]);
    
    // Generate a random 6-digit OTP
    $otp = rand(100000, 999999);
    
    // Send the OTP to the user's email
    Mail::to($request->email)->send(new ForgotPassword($otp));
  
    
    // Check for failures
   if (Mail::to($request->email)->send(new ForgotPassword($otp))) {
    // return response()->json(['errors' => ['Success' => 'Otp Sent']], 200);
    $request->session()->put('otp', $otp);
    $request->session()->put('email', $request->email);
    return redirect('/checkOtp');
    

// return redirect()->back();
   }
   else {
    return response()->json(['errors' => ['Failed' => 'Invalid email ']], 422);

   }
    
}
public function checkOtp(Request $request)
{
$otp = $request->session()->get('otp', 'default');
$user = Bot::where('email', $request->session()->get('email', 'default'))->first();
// return response()->json([$request->otp,'and',$otp], 200);
$request->session()->put('email', $user->email);
$request->session()->put('name', $user->name);
return redirect('/edit');


if ($request->otp == $otp ) {
    return response()->json('Otp correct', 200);
    $request->session()->get('otp', 'default');
}
else
{
    return response()->json('Otp incorrect', 200);
}
}

}
