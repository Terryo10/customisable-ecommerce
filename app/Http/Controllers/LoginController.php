<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        return view('login');
    }

    public function forgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forgotPassword', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        $email = $request->input('email');

        session()->flash('message', "Reset password link sent to $email . Follow the link to reset your password and login again");

        return response()->back();
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|min:6',
            'password' => 'required|min:3',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session()->flash('message', "Login was successfull");

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
