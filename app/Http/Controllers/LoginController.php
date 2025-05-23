<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        return view('login');
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|min:3',
            'confirm_password' => 'required|same:password',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->email_token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['token' => $request->token])->delete();

        return redirect()->back()->with('message', 'Your password has been changed!');
    }

    public function forgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            [
                'email' => $request->email, // Match condition
            ],
            [
                'token' => $token, // Update or insert these values
                'created_at' => Carbon::now(),
            ]
        );

        Mail::send('emails.forgotPassword', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        $email = $request->input('email');

        session()->flash('message', "Reset password link sent to $email . Follow the link to reset your password and login again");

        return redirect()->back();
    }


    public function login(Request $request, $product_id = 1)
    {
        $request->validate([
            'email' => 'required|min:6',
            'password' => 'required|min:3',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session()->flash('message', "Login was successfull");

            return redirect()->to("/product/$product_id");

            return redirect()->back();
        } else {
            return redirect()->to('/login');
        }
    }

    public function showResetPasswordForm($token)
    {
        return view('livewire.reset-password-form', ['token' => $token]);
    }
}
