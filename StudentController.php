<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\classes;


class StudentController extends Controller
{
    //
    public function student()
    {
        $student = Student::all();
        return view('student', compact('student')); // Pass the data to the view
    }
    public function delete($id)
    {
        $student = Student::find($id);
        if(!is_null($id))
        {
        $student->delete();
        }
        return redirect()->back();
    }
    public function create()
    {
        $class = classes::all();
        return view('frontend.studentcreate', compact('class'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:class,id',
            // 'section' => 'required|string|max:12',
            'marks' => 'required|integer',
            'gender' => 'required|string|in:M,F|max:1',
        ]);

        // Create a new student record in the database
        Student::create($validated);

        // Redirect to the form with a success message
        return redirect()->route('student')->with('success', 'Student added successfully');
    }
    public function edit($id)
{
    $student = Student::find($id);
    return view('frontend.studentedit', compact('student'));
}
public function update(Request $request, $id)
{
    $student = Student::find($id);

    $student->name = $request->input('name');
    $student->class = $request->input('class');
    $student->section = $request->input('section');
    $student->marks = $request->input('marks');
    $student->gender = $request->input('gender');

    $student->update(); 

    return redirect('/student')->with('success', 'UPDATED SUCCESSFULLY');
}
public function view($id)
{
    $student = Student::findOrFail($id);
    return view('studentdetail', compact('student'));
}

}
