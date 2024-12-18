<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class GoogleAuthController extends Controller
{
    public function loginUsingGoogle(Request $request)
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function callbackFromGoogle(Request $request)
    {
        try {
            $user = Socialite::driver('google')
                ->stateless()
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
            $create_user = User::updateOrCreate([
                'email' => $user->getEmail(),
            ], [
                'name' => $user->getName(),
                'google_id' => $user->getId(),
                'avatar' => $user->getAvatar(),
                'password' => Hash::make($user->getName() . '#' . $user->getId())
            ]);
            Auth::loginUsingId($create_user->id);
            $token = $create_user->createToken('apiToken')->plainTextToken;
            // return redirect("/home/$token");
            return redirect("/");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function checkUser(Request $request)
    {
        try {
            $user_email = Auth::user()->email;
            $user = User::where('email', $user_email)->first();
            return  $this->jsonSuccess(200, "Request Successfully!!", $user, "user");
        } catch (\Throwable $error) {
            throw $error;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }
}
