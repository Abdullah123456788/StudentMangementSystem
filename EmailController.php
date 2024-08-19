<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\VerificationEmail;

class EmailController extends Controller
{
    public function sendVerificationEmail($id)
    {
        $users = User::find($id);
        if (!$users) {
            return back()->with('error', 'User not found');
        }
        try {
            Mail::to($users->email)->send(new VerificationEmail($users));
            $users->verified = 1;
            $users->save();
    
        } catch (\Exception $e) {
            \Log::error('Error sending verification success email: ' . $e->getMessage());
             return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'User verified successfully. An email has been sent to the user.');
    }
}