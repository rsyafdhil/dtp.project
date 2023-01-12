<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
    return view('students.index', [
        'students' => Student::latest()->paginate(5),
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
            'photo' => ['image'],
            'phone_number' => 'required|numeric',
            'class' => 'required',
            'address' => 'required',
        ]);

        $photoPath = '';

        if ($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('photos');
        }
        
        $students = new Student();

        $students->name = $request->name;
        $students -> photo = $photoPath;
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
            'photo' => 'required',
            'phone_number' => 'required|numeric',
            'class' => 'required',
            'address' => 'required',
        ]);

        $photoPath = '';

       

        $students = Student::find($id);

        if ($request->hasFile('photo')){
            if (Storage::exists($students->photo)){
                Storage::delete($students->photo);
            }
            $photoPath = $request->file('photo')->store('photos');
        }

        $students ->name = $request->name;
        $students ->photo = $photoPath;
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
    


public function show ($id)
{
    $achievements = DB::table('achievements')

    ->join('students', 'students.id', '=', 'achievements.student_id')
    ->where('achievements.student_id', '=', $id)
    ->select('students.name as student_name', 'students.id as student_id', 'achievements.*')
    ->get();

    return $achievements;
}

}