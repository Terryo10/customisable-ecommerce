<?php

namespace App\Http\Controllers;

use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:6',
            'password' => 'required|min:3',
            'confirm_password' => 'required|same:password',
        ]);

        $create_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => "",
            'password' => Hash::make($request->password)
        ]);

        Auth::loginUsingId($create_user->id);

        session()->flash('message', "Account created successfull");

        return redirect()->back();
    }
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|min:6',
        ]);
        $subscribe_user = Subscriptions::create([
            'email' => $request->email,
        ]);

        session()->flash('message', "Your email have been subscribed successfull");
        return redirect()->back();
    }
}
