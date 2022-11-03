<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
    return view('students.index', [
        'students' => Student::get(),
    ]);
    }
    
    public function create()
    {
        return view ('students.create');
    }
    
    public function store(Request $request)
    {
        $students = new Student();
        $students->name = $request->name;
        $students->phone_number = $request->phone_number;
        $students->address = $request->address;
        $students->class = $request->class;

        $students->save();

        return redirect()-> route('students.index');
    }
    
    public function edit($id)
    {
        $student = Student::find($id);

        
        return view('students.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $students = Student::find($id);

        $students ->name = $request->name;
        $students ->phone_number = $request->phone_number;
        $students ->address = $request->address;
        $students ->class = $request->class;
        
        $students ->save();

        return redirect()-> route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id)->delete();
        return redirect()->route('students.index');
    }
    
}