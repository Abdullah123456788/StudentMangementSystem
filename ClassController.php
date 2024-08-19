<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classes;


class ClassController extends Controller
{
    //
// public function class()
// {
//     return view('class');

// }
public function class()
    {
        $class = classes::all();
        $data = compact('class');
        return view('class')->with($data);
    }
    
public function delete($id)
    {
        $class = classes::find($id);
        if(!is_null($class))
        {
            $class->delete();
        }
        return redirect()->back();
    }
public function store(Request $request)
{
    $validated = $request->validate([
        'class' => 'required|integer',
        'section' => 'required|string|max:12',
    ]);
    classes::create($validated);
    return redirect()->route('class')->with('success', 'Class added successfully');
}
public function edit($id)
{
    $class = classes::find($id);
    return view('frontend.classedit', compact('class'));
}
public function update(Request $request, $id)
{
    $classs = classes::find($id);

    $class->class = $request->input('class');
    $class->section = $request->input('section');

    $class->update(); 

    return redirect('/class')->with('success', 'UPDATED SUCCESSFULLY');
}

}
