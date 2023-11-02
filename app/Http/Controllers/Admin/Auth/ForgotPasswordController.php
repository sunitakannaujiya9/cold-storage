<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

       return view('auth.passwords.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ],[
           'email.required' => 'Email Id is required',
          ]);

        $token = Str::random(60);

        DB::table('students_password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.passwords.verify',['token' => $token], function($message) use ($request) {
                  $message->from('pmc123@gmail.com');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
