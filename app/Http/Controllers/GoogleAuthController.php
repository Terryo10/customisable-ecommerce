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
            $user = Socialite::driver('google')->stateless()->user();
            $create_user = User::updateOrCreate([
                'google_id' => $user->getId()
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
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
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully logged out',
        ]);
    }
}
