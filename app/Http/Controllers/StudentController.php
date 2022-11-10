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
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'phone_number' => 'required|numeric',
            'class' => 'required',
            'address' => 'required',
        ]);
        
        $students = new Student();

        $students->name = $request->name;
        $students->phone_number = $request->phone_number;
        $students->address = $request->address;
        $students->class = $request->class;

        $students->save();

        //session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()-> route('students.index')->withSuccess('Data Berhasil Ditambahkan!');
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
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'phone_number' => 'required|numeric',
            'class' => 'required',
            'address' => 'required',
        ]);

        $students = Student::find($id);

        $students ->name = $request->name;
        $students ->phone_number = $request->phone_number;
        $students ->address = $request->address;
        $students ->class = $request->class;
        
        $students ->save();

        //session()->flash('success', 'Data Berhasil Diperbarui');

        return redirect()-> route('students.index')->withInfo('Data Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $student = Student::find($id)->delete();
        return redirect()->route('students.index')->withDanger('Data Berhasil Dihapus!');
    }
    
}