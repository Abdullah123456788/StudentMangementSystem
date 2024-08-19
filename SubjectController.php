<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\classes;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    public function subject()
    {
        $subjects = Subject::with('classes')->get();
        return view('subject', compact('subjects'));
    }

    public function create()
    {
        $class = classes::all();
        return view('frontend.subjectscreate', compact('class'));
    }
    public function delete($id)
    {
        $subjects = Subject::find($id);
        if(!is_null($id))
        {
        $subjects->delete();
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|array',
        ]);
        $subject = Subject::create([
            'name' => $request->input('name'),
        ]);
        foreach ($request->input('class') as $class_id) {
        $subject->classes()->attach($class_id);
        }
        return redirect()->route('subject')->with('success', 'Subject created successfully.');
    }
    
}