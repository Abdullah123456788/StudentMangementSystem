<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registeration;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate form data
            $validatedData = $request->validate([
                'name' => 'required',
                'username' => 'required|unique:registrations', // Adjust table name if needed
                'email' => 'required|email|unique:registrations', // Adjust table name if needed
                'phonenumber' => 'required|numeric|min:0|max:99999999999',
                'password' => 'required|min:3|confirmed',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file size limit if needed
            ]);

            // Hash the password before storing it in the database
            $validatedData['password'] = bcrypt($validatedData['password']);

            // Store the uploaded image
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images'); // You can adjust the storage path

                // Update user's profile with the image path
                $validatedData['image'] = $imagePath;
            }

            // Create a new record in the database using the Registration model
            // Registration::create($validatedData);
            User::create($validatedData);

            // Redirect to the dashboard view after successful registration
            return redirect()->route('dashboard.view')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error($e->getMessage());

            // Redirect back with the actual error message
            return redirect()->back()->with('error', 'Failed to register. Please try again later.');
        }
    }
}
