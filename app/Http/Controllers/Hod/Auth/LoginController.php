<?php

namespace App\Http\Controllers\Hod\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login()
    {
        // if (Auth::guard('web')->check()) {
        //     return redirect('/hod/dashboard');
        // } else {
        //     return view('hod.auth.login');
        // }

        if (Auth::guard('web')->check()) {
            // Get the user's user_type if they are authenticated
            $userType = Auth::guard('web')->user()->user_type ?? null;
    
            // Check if the user_type is 3
            if ($userType == 3) {
                // Redirect to the HOD dashboard for user_type 3
                return redirect('/hod/dashboard');
            } else {
                // Redirect to a different dashboard or show a message for other user types
                // Adjust this part according to your application logic
                return redirect('/hod/login');
            }
        }
    
        // Show the login view for users who are not authenticated
        return view('hod.auth.login');

    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string',
        ],[
           'email.required' => 'Email Id is required',
           'password.required' => 'Password is required',
          ]);

        $credentials = $request->only('email', 'password');
        // $remember_me = $request->has('remember_token') ? true : false;

        if (Auth::attempt($credentials)) {
            // $user = auth()->user();
            $user = auth()->user();

        // Check the user's user_type
        if ($user->user_type == 3) {
            // return $user;
            return redirect()->intended('/hod/dashboard')->with('message', 'You are login Successfully.');
        }
        else {
            // Redirect to a different dashboard or show a message for other user types
            // Adjust this part according to your application logic
            return redirect('/hod/login')->with(['Input' => $request->only('email', 'password'), 'error' => 'Your Email id and Password do not match our records!']);
        }
    }
        else{
            return redirect('/hod/login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Email id and Password do not match our records!']);
        }

    }

    public function hodlogout() {
        Session::flush();
        Auth::logout();

        return redirect('/hod/login')->with('message', 'You are logout Successfully.');
    }
}
