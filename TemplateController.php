<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registeration;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;



class TemplateController extends Controller
{
    //
    public function index()
    {
        return view('signin');
    }
    public function register()
    {
      
        return view('register');
    }
    // public function dashboard()
    // {
    //     return view('frontend.dashboard');
    // }
    public function view()
    {
        $users = User::all();
        $data = compact('users');
        return view('dashboard-view')->with($data);
    }
    public function delete($id)
    {
        $users = User::find($id);
        if(!is_null($users))
        {
            $users->delete();
        }
        return redirect()->back();
    }
    public function edit($id)
    {
        $users = User::find($id);
     return view('edit', compact('users'));
    }
        
    public function update(Request $request, $id)
    {
        $users = User::find($id);
    
        $users->name = $request->input('name');
        $users->email = $request->input('email');

        if ($request->hasFile('image')) {
            if ($users->image) {
                Storage::delete($users->image);
            }
            $imagePath = $request->file('image')->store('public/images');
            $users->image = $imagePath;
        }
            $users->update(); 
    
        return redirect('/dashboard/view')->with('success', 'UPDATED SUCCESSFULLY');
    }
    // public function verifyUser($id)
    // {
    //     $user = User::find($id);
    //     if ($user) {
    //         $user->verified = true;
    //         $user->save();
    //         return redirect()->back();
    //     } else {
    //         return redirect()->back();
    //     }
    // }


    
    public function show($file = null)
    {
    if ($file === null) {
        abort(404);
    }
    
    $filePath = 'dashboard.view' . $file;
    
    if (view()->exists($filePath)) {
        return view($filePath);
    } else {
        abort(404);
    }
}
}