<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin(Request $request)
{
    try {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user->verified) {
                Auth::logout();
                return redirect()->back()->withInput($request->only('email'))->with('error', 'Your account is not verified.');
            }
            
            
            return redirect()->route('dashboard.view');
        }
        return redirect()->back()->withInput($credentials['email'])->with('error', 'Invalid email or password.');
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        return redirect()->back()->withInput($credentials['email'])->with('error', $e->getMessage());
    }
}

}
